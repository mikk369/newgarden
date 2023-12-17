<?php
// Add CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

// Get db connection
require_once '../../db/db_connect.php';

// Retrieve the request body
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// Retrieve the post ID and updated data from the request
$contactId = isset($data['id']) ? $data['id'] : '';
$updatedImage = isset($data['image']) ? $data['image'] : '';
$updatedName = isset($data['name']) ? $data['name'] : '';
$updatedJobtitle = isset($data['jobTitle']) ? $data['jobTitle'] : '';
$updatedPhone_1 = isset($data['phone_1']) ? $data['phone_1'] : '';
$updatedPhone_2 = isset($data['phone_2']) ? $data['phone_2'] : '';
$updatedEmail = isset($data['email']) ? $data['email'] : '';

// Validation
if (empty($updatedName) || empty($updatedJobtitle)) {
    echo "Updated name, and updated job title are required";
    exit;
}

// Construct the SQL query using a prepared statement
$query = "UPDATE contacts SET image = ?, name = ?, jobTitle = ?, phone_1 = ?, 
phone_2 = ?, email = ? WHERE id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);

// Bind parameters to the query
mysqli_stmt_bind_param($stmt, "ssssssi", $updatedImage, $updatedName, 
$updatedJobtitle, $updatedPhone_1, $updatedPhone_2, $updatedEmail, $contactId);

// Execute the query
$result = mysqli_stmt_execute($stmt);

// If execution fails, show an error
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);

// Send a success response
echo "Contact updated successfully!";
?>
