<?php

/** This is the Shibboleth SSO callback script.
 * @author Tim Chen <tim@delta.games>
 * @version 1.0.0
 */

const API_INIT = 'https://certitude-demo.delta.games/circinus/iAPI/shibCallback';
const API_SUCCESS = 'https://certitude-demo.delta.games/circinus/iAPI/shibCallbackSuccess';
const HOME_PAGE = 'https://m.certitude-demo.delta.games';

echo "Processing your request...\n";

parse_str($_SERVER['QUERY_STRING'], $query);
// Contains the JWT
$token = $query['token'];
$authorization = "Authorization: Bearer $token";
// Contains the university secret key and user ID verified by the university
$identifier = $_SERVER['HTTP_IDENTIFIER'];
$identifier = json_decode($identifier);
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
$res = json_decode($res, true);
// Check the response
if ($res['code'] === 'success') {
    // Initiate socket connection
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket === false) {
        echo 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . '';
        header('Location: ' . HOME_PAGE . '/error?step=1');
        return;
    }
    // Connect to the server
    $info = json_decode($res['msg']['json']);
    $address = $info->sIP;
    $port = $info->sPort;
    $result = socket_connect($socket, $address, $port);
    if ($result === false) {
        echo 'socket_connect() failed: reason: ' . socket_strerror(socket_last_error($socket)) . '';
        header('Location: ' . HOME_PAGE . '/error?step=2');
        return;
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
    $out = '';
    while ($out = socket_read($socket, 2048)) {
        $json = json_decode($out);
        if ($json[0] == 'bye') {
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
            break;
        }
    }
    // Close the socket
    socket_close($socket);
    $res = json_decode($res, true);
    if ($res['code'] === 'success') {
        // Redirect to the success page
        header('Location: ' . HOME_PAGE . '/credentials');
    } else {
        echo "An error occured.\n";
    }
} else {
    // Redirect to the error page
    header('Location: ' . HOME_PAGE . '/error');
}
