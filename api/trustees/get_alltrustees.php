<?php
require_once("../config.php");

// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Set the character set for the database connection
mysqli_set_charset($connection, "utf8mb4");

// Construct the SQL query using a prepared statement
$query = "SELECT * FROM trustees";

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
$jsonData = json_encode($data);

if($jsonData === false) {
    $jsonData = json_last_error_msg();
    die("JSON encoding error: $jsonData");
}

// Set proper header for JSON output
header('Content-Type: application/json');

// Echo the JSON data
echo $jsonData;

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);
?>
