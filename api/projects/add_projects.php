<?php 
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';


// Receive POST data from form with superglobal
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $project_content = isset($_POST['project_content']) ? $_POST['project_content'] : '';

// Validation
if (empty($name) || empty($project_content)) {
    $response = ['error' => 'Name and content are required'];
} else {
    // Make SQL query
    $query = "INSERT INTO projects (name, project_content) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("ss", $name, $project_content);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Project added successfully!'];
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
