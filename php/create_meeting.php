<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $customerName = $_POST['customer_name'];
    $meetingDate = $_POST['meeting_date'];
    $meetingTime = $_POST['meeting_time'];

    $stmt = $pdo->prepare("INSERT INTO meetings (user_id, customer_name, meeting_date, meeting_time) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userId, $customerName, $meetingDate, $meetingTime]);

    echo "Meeting scheduled successfully!";
}
?>