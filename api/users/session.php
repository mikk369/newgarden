<?php
require_once 'cookie.php';

// Call the function to set session cookie parameters
setSessionCookieParams();

session_start();
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

// Start or resume a session
$response = [
    'loggedIn' => false,
    'id' => null,
    'email' => null,
];

// Check if the user is logged in
if (isset($_SESSION['id'], $_SESSION['email'])) {
    $response['loggedIn'] = true;
    $response['id'] = $_SESSION['id'];
    $response['email'] = $_SESSION['email'];
} 

echo json_encode($response);
?>
