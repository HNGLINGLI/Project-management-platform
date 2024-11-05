<?php
include 'manage_engineers.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $engineer_id = intval($_GET['id']);
    
    // Correct SQL DELETE syntax
    $sql = "DELETE FROM engineers WHERE engineer_id = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter for the prepared statement
    $stmt->bind_param("i", $engineer_id);
    
    // Execute and check if insertion was successful
    if ($stmt->execute()) {
        echo "Member deleted successfully!";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
    
    $stmt->close();
} else {
    echo "ID parameter missing.";
}

$conn->close();
?>