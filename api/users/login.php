<?php
session_start();

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST ");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

// Get db connection
require_once '../../db/db_connect.php';

$data = json_decode(file_get_contents("php://input"));

// Check if JSON decoding was successful
if ($data === null) {
    $response['success'] = false;
    $response['message'] = 'Invalid JSON data';
    echo json_encode($response);
    exit; 
}

// Check if the necessary properties are set
if (!isset($data->email, $data->password)) {
    $response['success'] = false;
    $response['message'] = 'Email or password is missing';
    echo json_encode($response);
    exit;
}

$email = $data->email;
$password = $data->password;

$query = "SELECT * FROM users WHERE email = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();

$response = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Store user information in session
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        session_regenerate_id(true);
        
        $response['success'] = true;
        $response['message'] = 'Login successful';

    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid password';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'User not found';
}

echo json_encode($response);

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);
?>
