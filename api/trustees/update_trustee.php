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

// Retrieve the trustee ID and updated data from the request
$trusteeId = isset($data['id']) ? $data['id'] : '';
$updatedName = isset($data['name']) ? $data['name'] : '';
$updatedTableGroupName = isset($data['table_group_name']) ? $data['table_group_name'] : '';

// Validation
if (empty($updatedName) || empty($updatedTableGroupName)) {
    echo "Updated name, and updated table group name are required";
    exit;
}

// Construct the SQL query using a prepared statement
$query = "UPDATE trustees SET name = ?, table_group_name = ? WHERE id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);

// Bind parameters to the query
mysqli_stmt_bind_param($stmt, "ssi", $updatedName, $updatedTableGroupName, $trusteeId);

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
echo "Trustee updated successfully!";
?>
