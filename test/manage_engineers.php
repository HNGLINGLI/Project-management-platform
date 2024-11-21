<?php
$servername = "localhost"; 
$username = "Your_database_username";        
$password = "Your_database_password";            
$dbname = "Your_database_name"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>