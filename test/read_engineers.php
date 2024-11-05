<?php
$servername = "localhost"; 
$username = "hnglingli";        
$password = "Cindy0205";            
$dbname = "project_tracking"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch engineers data
$sql = "SELECT engineer_id, name FROM Engineers";
$result = $conn->query($sql);

$engineers = array();

if ($result->num_rows > 0) {
    // Add each row to the array
    while($row = $result->fetch_assoc()) {
        $engineers[] = $row;
    }
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($engineers);

$conn->close();
?>