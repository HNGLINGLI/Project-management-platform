<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $projectId = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM projects WHERE project_id = ?");
    $stmt->execute([$projectId]);

    $response['success'] = true;
    $response['message'] = 'Project deleted successfully!';

    echo json_encode($response);
}
?>