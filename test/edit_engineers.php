<?php
echo "Editing Engineer!";

$servername = "localhost";
$username = "Your_database_username";
$password = "Your_database_password";
$dbname = "Your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching the engineer data based on the ID from GET parameters
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM engineers WHERE engineer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $engineer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $engineer = $result->fetch_assoc();
    $stmt->close();
}

// Updating the engineer record based on POST data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $engineer_id = (int)$_POST['id']; // Get engineer ID from hidden input in POST
    $name = htmlspecialchars($_POST['name']);
    $position = htmlspecialchars($_POST['position']);
    $age = (int)$_POST['age'];
    $startDate = $_POST['startDate'];
    $salary = str_replace(",", "", $_POST['salary']); 

    $query = "UPDATE engineers SET name = '$name', position = '$position', age = $age, start_date = '$startDate', salary = $salary WHERE engineer_id = $engineer_id";

    if ($conn->query($query) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
    // $stmt->close();
}
$conn->close();
?>