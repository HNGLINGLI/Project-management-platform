<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Notifications to manager: If assistance is required, notifications are sent to managers. -->
    <title>Notifications to Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Notifications to Manager</h2>
        <form action="send_notifications.php" method="post">
            <div class="form-group">
                <label for="project_id">Project:</label>
                <select id="project_id" name="project_id" required>
                    <option value="">Select a Project</option>
                    <!-- Populate with projects from the database using PHP -->
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'Hnglingli', 'Cindy0205', 'notifications');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT project_id, project_name FROM Projects";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['project_id'] . "'>" . $row['project_name'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <button type="submit">Send Notifications</button>
        </form>
    </div>

    <script>
        // Optional: Add JavaScript validations or enhancements
    </script>
</body>
</html>

<!-- PHP script (send_notifications.php) to handle notifications -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $project_id = $_POST['project_id'];
    
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Find reports that require assistance
    $sql = "SELECT * FROM ProgressReports WHERE project_id = ? AND assistance_needed IS NOT NULL AND assistance_needed != ''";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Notifications for Project ID: " . $project_id . "</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>Engineer ID: " . $row['engineer_id'] . "</p>";
            echo "<p>Report Date: " . $row['report_date'] . "</p>";
            echo "<p>Assistance Needed: " . $row['assistance_needed'] . "</p><hr>";
            // Here you can add code to send email notifications to the manager
        }
    } else {
        echo "No assistance needed for the selected project.";
    }

    $stmt->close();
    $conn->close();
}
?>