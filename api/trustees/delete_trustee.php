<?php
// add CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

// Get db connection
require_once '../../db/db_connect.php';

    // Retrieve the post ID from the request
    $postId = isset($_GET['id']) ? $_GET['id'] : '';

    // Validation
    if (empty($postId)) {
        echo "Trustee ID is required";
        exit;
    }

    // Construct the SQL query using a prepared statement
    $query = "DELETE FROM trustees WHERE id = ?";
    
    // Prepare the SQL query
    $stmt = mysqli_prepare($connection, $query);

    // Bind the post ID parameter
    mysqli_stmt_bind_param($stmt, "i", $postId);

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
    echo "trustee deleted successfully!";

?>
