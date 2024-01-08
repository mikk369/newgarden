<?php
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    exit;
}

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (email, password ) VALUES (?, ?)";
$stmt = $connection->prepare($query);

// Bind parameters to the prepared statement
$stmt->bind_param("ss", $email, $password);

// Execute query and handle errors
if ($stmt->execute()) {
    $response = ['success' => 'User added successfully!'];
} else {
    $response = ['error' => 'Error adding user: ' . $stmt->error];
}

// Close prepared statement
$stmt->close();

// Close connection
mysqli_close($connection);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
