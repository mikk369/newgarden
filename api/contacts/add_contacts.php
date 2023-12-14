<?php
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Receive POST data from form with superglobal
$name = isset($_POST['name']) ? $_POST['name'] : '';
$jobTitle = isset($_POST['jobTitle']) ? $_POST['jobTitle'] : '';
$phone_1 = isset($_POST['phone_1']) ? $_POST['phone_1'] : '';
$phone_2 = isset($_POST['phone_2']) ? $_POST['phone_2'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validation
if (empty($name) || empty($jobTitle)) {
    $response = ['error' => 'Name and jobTitle are required'];
} else {
    // Handle file upload
    $imagePath = '';

    if (!empty($_FILES['image']['name'])) {
        $parentDir = dirname(__DIR__);  
        $uploadDir = $parentDir . '/client/src/photos/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // File uploaded successfully, store the path
            $imagePath = 'client/src/photos/' . basename($_FILES['image']['name']);
        } else {
            // Handle the file upload error
            $response = ['error' => 'File upload failed'];
            echo json_encode($response);
            exit;
        }
    }

    // Make SQL query
    $query = "INSERT INTO contacts (image, name, jobTitle, phone_1, phone_2, email ) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("sssiis",$image, $name, $jobTitle, $phone_1, $phone_2, $email);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Contact added successfully!'];
    } else {
        $response = ['error' => 'Error adding contact: ' . $stmt->error];
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
