<?php
require 'db.php'; // Include your database connection

$month = $_GET['month'];
$year = $_GET['year'];
$stmt = $pdo->query("SELECT meeting_id, customer_name, date, time, name as engineer_name FROM meetings m INNER JOIN engineers e ON m.engineer_id = e.engineer_id WHERE monthname(date) = '$month' and year(date) = '$year'");
$meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($meetings);

// foreach ($meetings as $meeting) {
//     echo "Meeting with " . htmlspecialchars($meeting['customer_name']) . " on " . htmlspecialchars($meeting['date']) . " at " . htmlspecialchars($meeting['time']) . "<br>";
// }
?>