<?php
require '../php/db.php';

$stmt = $pdo->query("SELECT engineer_id, name, position, age, start_date, salary FROM engineers");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($projects);
?>