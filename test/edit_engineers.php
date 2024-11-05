<?php
echo "Editing Engineer!";

$servername = "localhost";
$username = "hnglingli";
$password = "Cindy0205";
$dbname = "project_tracking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching the engineer data based on the ID from GET parameters
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = (int)$_GET['$id'];
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

    // Correct SQL UPDATE syntax
    $sql = "UPDATE engineers SET name = ?, position = ?, age = ?, start_date = ?, salary = ? WHERE WHERE engineer_id = ?";
    $stmt = $conn->prepare($sql);
    // Bind parameters, added id at the end for the WHERE clause
    $stmt->bind_param("ssidsi", $name, $position, $age, $startDate, $salary, $engineer_id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
        exit();
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
}
$conn->close();
?>

<!-- HTML form for editing -->
<!DOCTYPE html>
<html lang="en">
<head><title>Edit Engineer</title></head>
<body>
<form action="edit_engineer.php?id=<?php echo $id; ?>" method="POST"> <!-- Include ID in the action -->
    <input type="hidden" name="id" value="<?php echo $engineer['id']; ?>">
    <input type="text" name="name" value="<?php echo htmlspecialchars($engineer['name']); ?>" required>
    <input type="text" name="position" value="<?php echo htmlspecialchars($engineer['position']); ?>" required>
    <input type="number" name="age" value="<?php echo htmlspecialchars($engineer['age']); ?>" required>
    <input type="date" name="startDate" value="<?php echo htmlspecialchars($engineer['start_date']); ?>" required>
    <input type="text" name="salary" value="<?php echo htmlspecialchars(number_format($engineer['salary'], 2)); ?>" required>
    <button type="submit">Update</button>
</form>
</body>
</html>