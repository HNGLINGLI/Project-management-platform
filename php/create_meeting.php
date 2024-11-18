<?php
require 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerName = $_POST['customer_name'];
    $meetingDate = $_POST['meeting_date'];
    $meetingTime = $_POST['meeting_time'];
    $engineerId = $_POST['engineer_id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO meetings (customer_name, date, time, engineer_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$customerName, $meetingDate, $meetingTime, $engineerId]);

        // If the insertion was successful, update the response
        $response['success'] = true;
        $response['message'] = 'Meeting scheduled successfully!';
    } catch (Exception $e) {
        // Log the error and set the failure message
        $response['message'] = 'Error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>