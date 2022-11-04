<?php

/** This is the Shibboleth SSO callback script.
 * @author Tim Chen <tim@delta.games>
 * @version 1.0.0
 */

const DEBUG = true;
const API_INIT = 'https://certitude-demo.delta.games/circinus/iAPI/shibCallback';
const API_SUCCESS = 'https://certitude-demo.delta.games/circinus/iAPI/shibCallbackSuccess';
const HOME_PAGE = 'https://m.certitude-demo.delta.games';

echo "<div style='color:green'>Processing your request...</div>";

parse_str($_SERVER['QUERY_STRING'], $query);
// Contains the JWT
$token = $query['token'];
$authorization = "Authorization: Bearer $token";
// Contains the university secret key and user ID verified by the university
$identifier = $_SERVER['HTTP_IDENTIFIER'];
$identifier = json_decode($identifier);
if (DEBUG) {
    echo "<div>Requesting: ". API_INIT ."</div>";
}
// Initiate the cURL session
$req = curl_init(API_INIT);
curl_setopt($req, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
curl_setopt($req, CURLOPT_POST, true);
curl_setopt($req, CURLOPT_POSTFIELDS, json_encode(array(
    'universityId' => $identifier->universityId,
    'studentId' => $identifier->studentId
)));
curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
// Execute the cURL session
$res = curl_exec($req);
// Close the cURL session
curl_close($req);
// Decode the response
if (DEBUG) {
    echo "<div>Response [shibCallback]: <span style='color:blue'>" . $res . "</span></div>";
}
$res = json_decode($res, true);
// Check the response
if ($res['code'] === 'success') {
    // Initiate socket connection
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket === false) {
        if (DEBUG) {
            echo 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . '';
        } else {
            header('Location: ' . HOME_PAGE . '/error');
        }
        return;
    }
    // Connect to the server
    $info = json_decode($res['msg']['json']);
    $address = $info->sIP;
    $port = $info->sPort;
    $start = microtime(true) * 1000;
    $result = socket_connect($socket, $address, $port);
    if ($result === false) {
        if (DEBUG) {
            echo 'socket_connect() failed: reason: ' . socket_strerror(socket_last_error($socket)) . '';
        } else {
            header('Location: ' . HOME_PAGE . '/error');
        }
        return;
    }
    if (DEBUG) {
        echo "<div>---------[Begin socket communications]</div>";
        echo '<div><span style="color:green">Connected</span> to <span style="color:orange">'. $address .':'. $port .'</span></div>';
    }
    /*
    * Flow: 
    * 1. User sends the init request to the server
    * 2. Server queries the database for the user's information
    * 3. Server sends the user's information to the client
    * 4. Socket closes after receiving the "bye" message
    */

    $student_id = $identifier->studentId;
    $init = "[\"init\",$student_id]";
    socket_write($socket, $init, strlen($init));
    if (DEBUG) {
        echo "<div>Socket request: <span style='color:blue'>" . $init . "</span></div>";
    }
    $out = '';
    while ($out = socket_read($socket, 2048)) {
        if (DEBUG) {
            echo "<div>Socket response: <span style='color:blue'>" . $out . "</span></div>";
        }
        $json = json_decode($out);
        if ($json[0] == 'bye') {
            if (DEBUG) {
                echo "<div>Requesting: ". API_SUCCESS ."</div>";
            }
            // Begin cURL session
            $req = curl_init(API_SUCCESS);
            curl_setopt($req, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
            curl_setopt($req, CURLOPT_POST, true);
            curl_setopt($req, CURLOPT_POSTFIELDS, json_encode(array(
                'results' => $json[1],
            )));
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            // Execute the cURL session
            $res = curl_exec($req);
            // Close the cURL session
            curl_close($req);
            if (DEBUG) {
                echo "<div>Response [shibCallbackSuccess]: <span style='color:blue'>" . $res . "</span></div>";
            }
            break;
        }
    }
    $end = microtime(true) * 1000;
    // Close the socket
    socket_close($socket);
    if (DEBUG) {
        echo '<div><span style="color:red">Disconnected</span> from <span style="color:orange">'. $address .':'. $port .'</span></div>';
        echo "<div>---------[End socket communications]</div>";
    }
    $res = json_decode($res, true);
    if ($res['code'] === 'success') {
        // Redirect to the success page
        if (DEBUG) {
            echo "<div>Entire transaction took " . ($end - $start) . "ms.</div>";
            echo "<div style='color:green'>Success! Click <a href='" . HOME_PAGE . "/credentials'>here</a> to return to your credentials page.</div>";
        } else {
            header('Location: ' . HOME_PAGE . '/credentials');
        }
    } else {
        echo "An error occured.\n";
    }
} else {
    // Redirect to the error page
    header('Location: ' . HOME_PAGE . '/error');
}
