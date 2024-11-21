<?php
$servername = "localhost"; 
$username = "hnglingli";        
$password = "Cindy_02052000";            
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

    // Handle salary input
    $salary = str_replace(",", "", $_POST['salary']); // Remove commas
    // Validate salary input
    if (is_numeric($salary)) {
        $salary = (float)$salary; // Convert to float for further processing
    } else {
        // Handle invalid salary input if necessary
        $salary = 0; // or some error handling
    }
}

    $query = "INSERT INTO engineers (name, position, age, start_date, salary) VALUES ('$name', '$position', $age, '$startDate', $salary)";

    // Execute and check if insertion was successful
    if ($conn->query($query) === TRUE) {
        echo "success";
    } else {
        echo "error: " . htmlspecialchars($stmt->error);
    }
    
// Close the database connection
$conn->close();
?>