<?php
require_once("../config.php");

// Add CORS headers
// header("Access-Control-Allow-Origin: https://test2.pailasteaed.ee");
// header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Set the character set for the database connection
mysqli_set_charset($connection, "utf8mb4");

// Construct the SQL query using a prepared statement
$query = "SELECT * FROM posts";

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

if (!$resultSet) {
    die("Error getting result set: " . mysqli_error($connection));
}

// Fetch the result as an associative array
$data = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);

if (!$data) {
    die("No data fetched from database.");
}

// Encode the result directly to JSON and echo it
$jsonData = json_encode($data);

if ($jsonData === false) {
    // JSON encoding error
    $jsonErrorMsg = json_last_error_msg();
    die("JSON encoding error: $jsonErrorMsg");
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
    