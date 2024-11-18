<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectName = $_POST['project_name'];
    $engineerId = $_POST['engineer_id'];
    $description = $_POST['description'];
    $phase = $_POST['phase'];
    $startDate = $_POST['start_date'];
    $deadline = $_POST['deadline'];

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO projects (project_name, description, phase, start_date, deadline) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$projectName, $description, $phase, $startDate, $deadline]);

        $project_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare("INSERT INTO project_engineers (project_id, engineer_id) VALUES (:project_id, :engineer_id)");
        foreach ($engineerId as $engineer_id) {
            $stmt->execute([':project_id' => $project_id, ':engineer_id' => $engineer_id]);
        }

        $pdo->commit();

        // If the insertion was successful, update the response
        $response['success'] = true;
        $response['message'] = 'Project created successfully!';
    } catch (Exception $e) {
        // Log the error and set the failure message
        $response['message'] = 'Error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>