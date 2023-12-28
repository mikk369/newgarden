<?php
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Receive POST data from form with superglobal
$title = isset($_POST['title']) ? $_POST['title'] : '';

// Validation
if (empty($title)) {
    $response = ['error' => 'title is required'];
} elseif (!empty($_FILES['file']['name'])) {

    // Handle file upload
    $file_tmp = $_FILES["file"]["tmp_name"];
    $documentFile = basename($_FILES["file"]["name"]);
    $document_folder = "client/src/documents/" . $documentFile;

    move_uploaded_file($file_tmp, "../../$document_folder");

    // Make SQL query
    $query = "INSERT INTO documents (title, document_folder) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("ss", $title, $document_folder);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Document added successfully!'];
    } else {
        $response = ['error' => 'Error adding document: ' . $stmt->error];
    }

    // Close prepared statement
    $stmt->close();
} elseif (!empty($_POST['link'])) {

    // Handle link
    $link = $_POST['link'];

    // Make SQL query
    $query = "INSERT INTO documents (title, link) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("ss", $title, $link);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Document added successfully!'];
    } else {
        $response = ['error' => 'Error adding document: ' . $stmt->error];
    }

    // Close prepared statement
    $stmt->close();
} else {
    $response = ['error' => 'Invalid request'];
}

// Close connection
mysqli_close($connection);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
