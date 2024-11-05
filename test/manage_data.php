<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $action = isset($_POST['action']) ? $_POST['action'] : ($_POST['engineer_id'] ? 'edit' : 'add');

    // Database connection
    $conn = new mysqli('sql106.infinityfree.com', 'if0_37456022', 'XK20HnJF6z17vj', 'if0_37456022_database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($action == "add") {
        if ($type == "engineer") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $sql = "INSERT INTO Engineers (name, email, role) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $role);

            if ($stmt->execute()) {
                echo "Engineer successfully added.<br>";
                echo "<h3>Details Added:</h3>";
                echo "<p>Name: $name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Role: $role</p>";
            }
        } elseif ($type == "project") {
            $project_name = $_POST['project_name'];
            $description = $_POST['description'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];

            $sql = "INSERT INTO Projects (project_name, description, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $project_name, $description, $start_date, $end_date, $status);

            if ($stmt->execute()) {
                echo "Project successfully added.<br>";
                echo "<h3>Details Added:</h3>";
                echo "<p>Project Name: $project_name</p>";
                echo "<p>Description: $description</p>";
                echo "<p>Start Date: $start_date</p>";
                echo "<p>End Date: $end_date</p>";
                echo "<p>Status: $status</p>";
            }
        } elseif ($type == "progress_report") {
            $engineer_id = $_POST['engineer_id'];
            $project_id = $_POST['project_id'];
            $report_date = $_POST['report_date'];
            $progress = $_POST['progress'];
            $assistance_needed = $_POST['assistance_needed'];

            $sql = "INSERT INTO ProgressReports (engineer_id, project_id, report_date, progress, assistance_needed) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iisss", $engineer_id, $project_id, $report_date, $progress, $assistance_needed);

            if ($stmt->execute()) {
                echo "Progress report successfully added.<br>";
                echo "<h3>Details Added:</h3>";
                echo "<p>Engineer ID: $engineer_id</p>";
                echo "<p>Project ID: $project_id</p>";
                echo "<p>Report Date: $report_date</p>";
                echo "<p>Progress: $progress</p>";
                echo "<p>Assistance Needed: $assistance_needed</p>";
            }
        }
    } elseif ($action == "edit") {
        if ($type == "engineer") {
            $engineer_id = $_POST['engineer_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $sql = "UPDATE Engineers SET name = ?, email = ?, role = ? WHERE engineer_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $email, $role, $engineer_id);

            if ($stmt->execute()) {
                echo "Engineer successfully edited.<br>";
                echo "<h3>Details Updated:</h3>";
                echo "<p>Engineer ID: $engineer_id</p>";
                echo "<p>Name: $name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Role: $role</p>";
            }
        } elseif ($type == "project") {
            $project_id = $_POST['project_id'];
            $project_name = $_POST['project_name'];
            $description = $_POST['description'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];

            $sql = "UPDATE Projects SET project_name = ?, description = ?, start_date = ?, end_date = ?, status = ? WHERE project_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $project_name, $description, $start_date, $end_date, $status, $project_id);

            if ($stmt->execute()) {
                echo "Project successfully edited.<br>";
                echo "<h3>Details Updated:</h3>";
                echo "<p>Project ID: $project_id</p>";
                echo "<p>Project Name: $project_name</p>";
                echo "<p>Description: $description</p>";
                echo "<p>Start Date: $start_date</p>";
                echo "<p>End Date: $end_date</p>";
                echo "<p>Status: $status</p>";
            }
        } elseif ($type == "progress_report") {
            $report_id = $_POST['report_id'];
            $progress = $_POST['progress'];
            $assistance_needed = $_POST['assistance_needed'];

            $sql = "UPDATE ProgressReports SET progress = ?, assistance_needed = ? WHERE report_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $progress, $assistance_needed, $report_id);

            if ($stmt->execute()) {
                echo "Progress report successfully edited.<br>";
                echo "<h3>Details Updated:</h3>";
                echo "<p>Report ID: $report_id</p>";
                echo "<p>Progress: $progress</p>";
                echo "<p>Assistance Needed: $assistance_needed</p>";
            }
        }
    } elseif ($action == "delete") {
        if ($type == "engineer") {
            $engineer_id = $_POST['engineer_id'];

            $sql = "DELETE FROM Engineers WHERE engineer_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $engineer_id);

            if ($stmt->execute()) {
                echo "Engineer successfully deleted.<br>";
            }
        } elseif ($type == "project") {
            $project_id = $_POST['project_id'];

            $sql = "DELETE FROM Projects WHERE project_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $project_id);

            if ($stmt->execute()) {
                echo "Project successfully deleted.<br>";
            }
        } elseif ($type == "progress_report") {
            $report_id = $_POST['report_id'];

            $sql = "DELETE FROM ProgressReports WHERE report_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $report_id);

            if ($stmt->execute()) {
                echo "Progress report successfully deleted.<br>";
            }
        }
    }

    $stmt->close();
    $conn->close();
}
?>
