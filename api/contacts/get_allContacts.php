<?php
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Construct the SQL query using a prepared statement
$query = "SELECT * FROM contacts";

// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);

// Execute the query
$result = mysqli_stmt_execute($stmt);

// If execution fails, show an error
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

// Get the result set
$resultSet = mysqli_stmt_get_result($stmt);
// Fetch the result as an associative array
$data = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);

// Encode the result directly to JSON and echo it
echo json_encode($data);

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);
?>
