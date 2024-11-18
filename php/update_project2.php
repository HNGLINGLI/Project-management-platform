<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['id'];
    $name = $_POST['name'];
    $engineerId = $_POST['engineer'];
    $description = $_POST['description'];
    $phase = $_POST['phase'];
    $deadline = $_POST['deadline'];

    try {
        $stmt = $pdo->prepare("UPDATE projects SET project_name = ?, description = ?, phase = ?, deadline = ? WHERE project_id = ?");
        $stmt->execute([$name, $description, $phase, $deadline, $projectId]);

        $stmt = $pdo->prepare("DELETE FROM project_engineers WHERE project_id = ?");
        $stmt->execute([$projectId]);

        $stmt = $pdo->prepare("INSERT INTO project_engineers (project_id, engineer_id) VALUES (:project_id, :engineer_id)");
        foreach ($engineerId as $engineer_id) {
            $stmt->execute([':project_id' => $projectId, ':engineer_id' => $engineer_id]);
        }

        // If the update was successful, update the response
        $response['success'] = true;
        $response['message'] = 'Project updated successfully!';
    } catch (Exception $e) {
        // Log the error and set the failure message
        $response['message'] = 'Error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>