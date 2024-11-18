<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $meetingId = $_POST['meeting_id'];
    $customerName = $_POST['customer_name'];
    $meetingDate = $_POST['meeting_date'];
    $meetingTime = $_POST['meeting_time'];

    $stmt = $pdo->prepare("UPDATE meetings SET customer_name = ?, date = ?, time = ? WHERE meeting_id = ?");
    $stmt->execute([$customerName, $meetingDate, $meetingTime, $meetingId]);

    echo "Meeting updated successfully!";
}
?>