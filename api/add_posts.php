<?php 
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once "../db/db_connect.php";

// Receive POST data from form with superglobal
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

// Validation
if (empty($title) || empty($content)) {
    $response = ['error' => 'Title and content are required'];
} else {
    // Make SQL query
    $query = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("ss", $title, $content);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Post added successfully!'];
    } else {
        $response = ['error' => 'Error adding post: ' . $stmt->error];
    }

    // Close prepared statement
    $stmt->close();
}

// Close connection
mysqli_close($connection);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
