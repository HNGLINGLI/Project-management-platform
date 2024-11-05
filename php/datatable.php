<?php
require 'db.php';

try {
    // SQL query to fetch data
    $query = "SELECT name, position, office, age, start_date, salary FROM employees"; // Update with your table name and columns
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch the data as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON for DataTable
    echo json_encode($result);
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}