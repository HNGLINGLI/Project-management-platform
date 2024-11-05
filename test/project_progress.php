<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Engineer logs in and submits progress: Engineers can log into the system, choose a project, and update the progress.-->
    <title>Engineer Project Progress</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Engineer Project Progress Submission</h2>
        <form action="submit_progress.php" method="post">
            <div class="form-group">
                <label for="engineer_id">Engineer ID:</label>
                <input type="text" id="engineer_id" name="engineer_id" required>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select id="project_id" name="project_id" required>
                    <option value="">Select a Project</option>
                    <!-- Populate with projects from the database using PHP -->
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'username', 'password', 'database_name');
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

            <div class="form-group">
                <label for="progress">Progress:</label>
                <textarea id="progress" name="progress" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="assistance_needed">Assistance Needed:</label>
                <textarea id="assistance_needed" name="assistance_needed" rows="4"></textarea>
            </div>

            <button type="submit">Submit Progress</button>
        </form>
    </div>

    <script>
        // Optional: Add JavaScript validations or enhancements
    </script>
</body>
</html>

<!-- PHP script (submit_progress.php) to handle form submission -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $engineer_id = $_POST['engineer_id'];
    $project_id = $_POST['project_id'];
    $progress = $_POST['progress'];
    $assistance_needed = $_POST['assistance_needed'];
    
    // Database connection
    $conn = new mysqli('localhost', 'Hnglingli', 'Cindy0205', 'progressreports');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert progress into database
    $sql = "INSERT INTO ProgressReports (engineer_id, project_id, report_date, progress, assistance_needed) VALUES (?, ?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $engineer_id, $project_id, $progress, $assistance_needed);

    if ($stmt->execute()) {
        echo "Progress successfully submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>