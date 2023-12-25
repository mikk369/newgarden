<?php
// Add CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

// Get db connection
require_once '../../db/db_connect.php';

// Retrieve the post ID from the request
$projectId = isset($_GET['id']) ? $_GET['id'] : '';

// Validation
if (empty($projectId)) {
    echo "Project ID is required";
    exit;
}

// Construct the SQL query using a prepared statement
$query = "SELECT * FROM projects WHERE id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);

// Bind the post ID parameter
mysqli_stmt_bind_param($stmt, "i", $projectId);

// Execute the query
$result = mysqli_stmt_execute($stmt);

// If execution fails, show an error
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

// Get the result set
$resultSet = mysqli_stmt_get_result($stmt);

// Fetch the post data
$projectData = mysqli_fetch_assoc($resultSet);

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);

// Check if project data is found
if ($projectData) {
    // Convert the project data to JSON and send as response
    echo json_encode($projectData);
} else {
    // Send a not found response
    echo "Project not found";
}
?>
