<?php
// Add CORS headers
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Headers: * ");

// Get db connection
require_once '../../db/db_connect.php';

// Construct the SQL query using a prepared statement
$query = "SELECT
g.id AS group_id,
g.group_name,
g.phone,
p.teacher_1,
p.teacher_2,
p.assistant_teacher,
p.assistant,
p.special_teacher
FROM
groups g
JOIN
Professions p ON g.id = p.group_id;
    -- ORDER BY
    -- g.createdAt DESC;
";

/// Prepare the SQL query
$stmt = mysqli_prepare($connection, $query);
// Execute the query
$result = mysqli_stmt_execute($stmt);

// If execution fails, show an error
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

// Get the result set
$resultSet = mysqli_stmt_get_result($stmt);

// Fetch the result as an associative array
$data = [];
while ($row = mysqli_fetch_assoc($resultSet)) {
    $group_id = $row['group_id'];

    // If the group is not already in the array, add it
    if (!isset($data[$group_id])) {
        $data[$group_id] = [
            'id' => $group_id,
            'group_name' => $row['group_name'],
            'phone' => $row['phone'],
            'professions' => [],
        ];
    }

    // Add the profession details to the professions array
     $profession = [
        'id' => $group_id,
        'teacher_1' => $row['teacher_1'],
        'teacher_2' => $row['teacher_2'],
        'assistant_teacher' => $row['assistant_teacher'],
        'assistant' => $row['assistant'],
        'special_teacher' => $row['special_teacher'],
    ];

    // Filter out empty strings from the profession array
    $filteredProfessions = array_filter($profession, function ($value) {
        return $value !== '';
    });

    $data[$group_id]['professions'][] = $filteredProfessions;
}

// Convert the associative array to a numeric array
$formattedData = array_values($data);

// Encode the result directly to JSON and echo it
echo json_encode($formattedData);

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($connection);
?>
