<?php
require 'db.php'; // Include your database connection

$stmt = $pdo->query("SELECT * FROM meetings");
$meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($meetings as $meeting) {
    echo "Meeting with " . htmlspecialchars($meeting['customer_name']) . " on " . htmlspecialchars($meeting['meeting_date']) . " at " . htmlspecialchars($meeting['meeting_time']) . "<br>";
}
?>