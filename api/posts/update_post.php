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
$postId = isset($data['id']) ? $data['id'] : '';
$updatedTitle = isset($data['title']) ? $data['title'] : '';
$updatedContent = isset($data['content']) ? $data['content'] : '';

// Validation
if (empty($updatedTitle) || empty($updatedContent)) {
    echo "Updated title, and updated content are required";
    exit;
}

// Construct the SQL query using a prepared statement
$query = "UPDATE posts SET title = ?, content = ? WHERE id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);

// Bind parameters to the query
mysqli_stmt_bind_param($stmt, "ssi", $updatedTitle, $updatedContent, $postId);

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
echo "Post updated successfully!";
?>
