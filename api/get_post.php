<?php
// add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../db/db_connect.php';

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection (you can use other methods depending on your context)
    $postId = mysqli_real_escape_string($connection, $_GET['id']);

    // Construct the SQL query with a WHERE clause to filter by ID
    $query = "SELECT * FROM posts WHERE id = '$postId'";

    // Send a query to the MySQL database
    $result = mysqli_query($connection, $query);

    // If no result, show an error
    if (!$result) {
        die("Database query failed: " . mysqli_error($connection));
    }

    // Encode the result directly to JSON and echo it
    echo json_encode(mysqli_fetch_assoc($result));
} else {
    // If 'id' parameter is not present, return an error message or handle it accordingly
    echo json_encode(array('error' => 'ID parameter is missing'));
}

// Close connection
mysqli_close($connection);
?>
