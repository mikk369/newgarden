<?php
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Receive POST data from form with superglobal
$trusteesData = isset($_POST['trusteesData']) ? $_POST['trusteesData'] : [];

foreach ($trusteesData as $index => $trustee) {
    $name = isset($trustee["name"]) ? $trustee["name"] : '';
    $table_group_name = isset($trustee["table_group_name"]) ? $trustee["table_group_name"] : '';

    // Validation
    if (empty($name) || empty($table_group_name)) {
        $response = ['error' => 'Name and group name are required'];
        echo json_encode($response);
        exit;
    }

    // Make SQL query
    $query = "INSERT INTO trustees (name, table_group_name) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind parameters to query
    $stmt->bind_param("ss", $name, $table_group_name);

    // Execute query and handle errors
    if ($stmt->execute()) {
        $response = ['success' => 'Trustees added successfully!'];
    } else {
        $response = ['error' => 'Error adding trustees: ' . $stmt->error];
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
