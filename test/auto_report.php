<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Auto-report generation: Based on submitted progress, the system generates reports daily or weekly -->
    <title>Auto-Report Generation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Auto-Report Generation</h2>
        <form action="generate_report.php" method="post">
            <div class="form-group">
                <label for="report_type">Report Type:</label>
                <select id="report_type" name="report_type" required>
                    <option value="">Select Report Frequency</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                </select>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select id="project_id" name="project_id" required>
                    <option value="">Select a Project</option>
                    <!-- Populate with projects from the database using PHP -->
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'Hnglingli', 'Cindy0205', 'projects');
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

            <button type="submit">Generate Report</button>
        </form>
    </div>

    <script>
        // Optional: Add JavaScript validations or enhancements
    </script>
</body>
</html>

<!-- PHP script (generate_report.php) to handle report generation -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $report_type = $_POST['report_type'];
    $project_id = $_POST['project_id'];
    
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate report based on the selected type
    $sql = "SELECT * FROM ProgressReports WHERE project_id = ?";
    if ($report_type == "daily") {
        $sql .= " AND report_date = CURDATE()";
    } elseif ($report_type == "weekly") {
        $sql .= " AND report_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Report for Project ID: " . $project_id . "</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>Engineer ID: " . $row['engineer_id'] . "</p>";
            echo "<p>Report Date: " . $row['report_date'] . "</p>";
            echo "<p>Progress: " . $row['progress'] . "</p>";
            echo "<p>Assistance Needed: " . $row['assistance_needed'] . "</p><hr>";
        }
    } else {
        echo "No reports found for the selected criteria.";
    }

    $stmt->close();
    $conn->close();
}
?>