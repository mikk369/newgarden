<?php

require_once("../config.php");
// Start the session
session_start();

header("Access-Control-Allow-Origin: " . CORS_URL);
// Destroy the session
session_destroy();

// Optionally, remove the session cookie
setcookie(session_name(), '', time() - 3600, '/');

// Send JSON response
$response = [
    'success' => true,
    'message' => 'Logout successful',
];

header('Content-Type: application/json');
echo json_encode($response);
?>