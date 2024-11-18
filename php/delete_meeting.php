<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $meetingId = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM meetings WHERE meeting_id = ?");
    $stmt->execute([$meetingId]);

    $response['success'] = true;
    $response['message'] = 'Meeting deleted successfully!';

    echo json_encode($response);
}
?>