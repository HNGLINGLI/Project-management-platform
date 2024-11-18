<?php
require 'db.php'; // Include your database connection

$limit = '';

if(isset($_GET['limit'])) {
    $limit = 'ORDER BY project_id DESC LIMIT ' . $_GET['limit'];
}

$stmt = $pdo->query("SELECT p.project_id, project_name, GROUP_CONCAT(e.name ORDER BY e.name ASC SEPARATOR ', ') AS engineer_name, description, phase, status, p.start_date, deadline, notes, e.engineer_id FROM projects p JOIN project_engineers pe ON p.project_id = pe.project_id JOIN engineers e ON pe.engineer_id = e.engineer_id GROUP BY p.project_id $limit");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($projects);
?>