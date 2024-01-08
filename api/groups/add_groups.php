<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Get db connection
require_once '../../db/db_connect.php';

// Assuming you receive data from the frontend
$groupName = isset($_POST['group_name']) ? $_POST['group_name'] : '';
$teacher_1 = isset($_POST['teacher_1']) ? $_POST['teacher_1'] : '';
$teacher_2 = isset($_POST['teacher_2']) ? $_POST['teacher_2'] : '';
$assistantTeacher = isset($_POST['assistant_teacher']) ? $_POST['assistant_teacher'] : '';
$assistant = isset($_POST['assistant']) ? $_POST['assistant'] : '';
$specialTeacher = isset($_POST['special_teacher']) ? $_POST['special_teacher'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

// Validation (you may want to add more validation)
if (empty($groupName)) {
    $response = ['error' => 'group name is required'];
} else {
    // Insert data into the tables
    $queryGroup = "INSERT INTO groups (group_name, phone) VALUES (?, ?)";
    $stmtGroup = $connection->prepare($queryGroup);
    $stmtGroup->bind_param("ss", $groupName, $phone);
    $stmtGroup->execute();
    $groupId = $stmtGroup->insert_id;
    $stmtGroup->close();

    $queryProfession = "INSERT INTO Professions (group_id, teacher_1, teacher_2, assistant_teacher, assistant, special_teacher) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtProfession = $connection->prepare($queryProfession);
    $stmtProfession->bind_param("isssss", $groupId, $teacher_1, $teacher_2, $assistantTeacher, $assistant, $specialTeacher );
    $stmtProfession->execute();
    $stmtProfession->close();

    $response = ['success' => 'Data inserted successfully'];
}

// Close connection
mysqli_close($connection);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
