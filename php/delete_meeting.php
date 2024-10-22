<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $meetingId = $_POST['meeting_id'];

    $stmt = $pdo->prepare("DELETE FROM meetings WHERE id = ?");
    $stmt->execute([$meetingId]);

    echo "Meeting deleted successfully!";
}
?>