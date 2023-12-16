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

// remove spaces
$phone_1 = str_replace(' ', '', $phone_1);
$phone_2 = str_replace(' ', '', $phone_2);

// Ensure phone numbers are set to NULL if empty
if (empty($phone_1)) {
    $phone_1 = null;
}

if (empty($phone_2)) {
    $phone_2 = null;
}

// Validation
if (empty($name) || empty($jobTitle)) {
    $response = ['error' => 'Name and jobTitle are required'];
} 
    // Handle file upload
   if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES["image"]["tmp_name"];
    $imageFile = basename($_FILES["image"]["name"]);
    $image = "client/src/photos/" . $imageFile;

    move_uploaded_file($file_tmp, "../../$image");

    echo "File uploaded";
} else {
    echo "File upload failed";
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


// Close connection
mysqli_close($connection);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
