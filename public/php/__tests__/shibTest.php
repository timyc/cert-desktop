<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . '';
    return;
}
// Connect to the server
$address = '185.99.135.33';
$port = 8081;
$result = socket_connect($socket, $address, $port);
if ($result === false) {
    echo 'socket_connect() failed: reason: ' . socket_strerror(socket_last_error($socket)) . '';
    return;
}
/*
 * Flow: 
 * 1. User sends the init request to the server
 * 2. Server queries the database for the user's information
 * 3. Server sends the user's information to the client
 * 4. Socket closes after receiving the "bye" message
 */ 
$init = "[\"init\",133769420]";
socket_write($socket, $init, strlen($init));
$out = '';
while ($out = socket_read($socket, 2048)) {
    $json = json_decode($out);
    echo var_dump($json[1]);
    if ($json[0] == 'bye') {
        break;
    }
}
socket_close($socket);