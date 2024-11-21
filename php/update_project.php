<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['project_id'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    try {
        $stmt = $pdo->prepare("UPDATE projects SET status = ?, notes = ? WHERE project_id = ?");
        $stmt->execute([$status, $notes, $projectId]);

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