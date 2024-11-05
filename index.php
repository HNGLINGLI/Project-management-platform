<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracking System - Manage Data</title>
    <link rel="stylesheet" href="styles.css">
</head>

<p>-- Relationships:
<p>-- 1. An engineer can work on multiple projects (One-to-Many between Engineers and Projects).
<p>-- 2. A project can have multiple progress reports (One-to-Many between Projects and ProgressReports).
<p>-- 3. Each progress report is linked to an engineer and a project.
<p>-- 4. Notifications table records the need for assistance or reporting updates to notify project managers.
<p>TODO: need to add SQL command to create Notifications record when:
<p> a) Adding Progress Report && Assistance Needed <> NULL
<p> b) Editing Progress Report && Assistance Needed has been modified (update Notifications table and set notified = FALSE)

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>Add Engineer</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="engineer">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" id="role" name="role" required>
                    </div>
                    <button type="submit">Add Engineer</button>
                </form>

                <h2>Add Project</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="project">
                    <div class="form-group">
                        <label for="project_name">Project Name:</label>
                        <input type="text" id="project_name" name="project_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" id="status" name="status" required>
                    </div>
                    <button type="submit">Add Project</button>
                </form>

                <h2>Add Progress Report</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="progress_report">
                    <div class="form-group">
                        <label for="engineer_id">Engineer ID:</label>
                        <input type="number" id="engineer_id" name="engineer_id" required>
                    </div>
                    <div class="form-group">
                        <label for="project_id">Project ID:</label>
                        <input type="number" id="project_id" name="project_id" required>
                    </div>
                    <div class="form-group">
                        <label for="report_date">Report Date:</label>
                        <input type="date" id="report_date" name="report_date" required>
                    </div>
                    <div class="form-group">
                        <label for="progress">Progress:</label>
                        <textarea id="progress" name="progress" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="assistance_needed">Assistance Needed:</label>
                        <textarea id="assistance_needed" name="assistance_needed"></textarea>
                    </div>
                    <button type="submit">Add Progress Report</button>
                </form>
            </div>

            <div class="column">
                <h2>Edit Engineer</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="engineer">
                    <div class="form-group">
                        <label for="engineer_id">Engineer ID:</label>
                        <input type="number" id="engineer_id" name="engineer_id" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" id="role" name="role">
                    </div>
                    <button type="submit">Edit Engineer</button>
                </form>

                <h2>Edit Project</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="project">
                    <div class="form-group">
                        <label for="project_id">Project ID:</label>
                        <input type="number" id="project_id" name="project_id" required>
                    </div>
                    <div class="form-group">
                        <label for="project_name">Project Name:</label>
                        <input type="text" id="project_name" name="project_name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" id="status" name="status">
                    </div>
                    <button type="submit">Edit Project</button>
                </form>

                <h2>Edit Progress Report</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="progress_report">
                    <div class="form-group">
                        <label for="report_id">Report ID:</label>
                        <input type="number" id="report_id" name="report_id" required>
                    </div>
                    <div class="form-group">
                        <label for="progress">Progress:</label>
                        <textarea id="progress" name="progress"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="assistance_needed">Assistance Needed:</label>
                        <textarea id="assistance_needed" name="assistance_needed"></textarea>
                    </div>
                    <button type="submit">Edit Progress Report</button>
                </form>
            </div>

            <div class="column">
                <h2>Delete Engineer</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="engineer">
                    <div class="form-group">
                        <label for="engineer_id">Engineer ID:</label>
                        <input type="number" id="engineer_id" name="engineer_id" required>
                    </div>
                    <button type="submit">Delete Engineer</button>
                </form>

                <h2>Delete Project</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="project">
                    <div class="form-group">
                        <label for="project_id">Project ID:</label>
                        <input type="number" id="project_id" name="project_id" required>
                    </div>
                    <button type="submit">Delete Project</button>
                </form>

                <h2>Delete Progress Report</h2>
                <form action="manage_data.php" method="post">
                    <input type="hidden" name="type" value="progress_report">
                    <div class="form-group">
                        <label for="report_id">Report ID:</label>
                        <input type="number" id="report_id" name="report_id" required>
                    </div>
                    <button type="submit">Delete Progress Report</button>
                </form>
            </div>
        </div>

        <div class="row">
            <h2>All Records</h2>
            <?php
            // Database connection
            $conn = new mysqli('sql106.infinityfree.com', 'if0_37456022', 'XK20HnJF6z17vj', 'if0_37456022_database');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Display Engineers
            echo "<h3>Engineers</h3>";
            $sql = "SELECT * FROM Engineers";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['engineer_id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . " - Role: " . $row['role'] . "</p>";
                }
            } else {
                echo "<p>No engineers found.</p>";
            }

            // Display Projects
            echo "<h3>Projects</h3>";
            $sql = "SELECT * FROM Projects";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['project_id'] . " - Name: " . $row['project_name'] . " - Description: " . $row['description'] . " - Start Date: " . $row['start_date'] . " - End Date: " . $row['end_date'] . " - Status: " . $row['status'] . "</p>";
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            // Display Progress Reports
            echo "<h3>Progress Reports</h3>";
            $sql = "SELECT * FROM ProgressReports";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['report_id'] . " - Engineer ID: " . $row['engineer_id'] . " - Project ID: " . $row['project_id'] . " - Report Date: " . $row['report_date'] . " - Progress: " . $row['progress'] . " - Assistance Needed: " . $row['assistance_needed'] . "</p>";
                }
            } else {
                echo "<p>No progress reports found.</p>";
            }

            // Display Notifications
            echo "<h3>Notifications</h3>";
            $sql = "SELECT * FROM Notifications";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['notification_id'] . " - Message: " . $row['message'] . " - Date: " . $row['date'] . "</p>";
                }
            } else {
                echo "<p>No notifications found.</p>";
            }



            $conn->close();
            ?>
        </div>
    </div>

    <script>
        // Optional: Add JavaScript validations or enhancements
    </script>
</body>
</html>
