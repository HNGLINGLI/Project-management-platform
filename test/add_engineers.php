<?php
$servername = "localhost"; 
$username = "hnglingli";        
$password = "Cindy0205";            
$dbname = "project_tracking"; 

// Enable detailed error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize POST data
    $name = htmlspecialchars($_POST['name']);
    $position = htmlspecialchars($_POST['position']);
    $age = (int)$_POST['age'];
    $startDate = $_POST['startDate'];
    $salary = str_replace(",", "", $_POST['salary']); 

    // Prepare SQL statement to insert data
    // Corrected SQL to match the number of columns and placeholders
    $sql = "INSERT INTO engineers (name, position, age, start_date, salary) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    // Bind parameters to the SQL query
    // Correct binding: name, position, age, startDate, salary
    $stmt->bind_param("ssids", $name, $position, $age, $startDate, $salary);

    // Execute and check if insertion was successful
    if ($stmt->execute()) {
        echo "Member added successfully!";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>