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
?>