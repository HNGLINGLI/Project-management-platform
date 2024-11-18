<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo.png" rel="icon">
  <title>Project Management</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/project-management.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="img/logo.png">
    </div>
    <div class="sidebar-brand-text mx-3">Project Management</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Features
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-tasks"></i>
      <span>Management</span>
    </a>
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">管理畫面</h6>
        <a class="collapse-item" href="simple-tables.php">Project Management</a>
        <a class="collapse-item" href="datatables.php">Engineer Directory</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="calendar.php">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Meetings</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="submit.php">
      <i class="fas fa-fw fa-upload"></i>
      <span>Submission</span>
    </a>
  </li>
<li class="nav-item">
  <a class="nav-link" href="notif.html">
    <i class="fas fa-fw fa-bell"></i>
    <span>Notifications</span>
  </a>
</li>
  <hr class="sidebar-divider">
</ul>
      
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #615751;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Container Fluid -->
<div class="container-fluid" id="container-wrapper">
  <!-- Row for Button and Table Content -->
  <div class="row">
    <div class="col-lg-12 mb-4 d-flex align-items-center justify-content-between">
      <div class="col-lg-12 mb-4">
          <!-- Work Progress Submission Card -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Project Assignment & Update</h6>
              </div>
              <div class="card-body">
                <form>
                  
                  <!-- Assigned Project (Read-only) -->
                  <div class="form-group">
                    <label for="assignedProject">Assigned Project</label>
                    <select class="form-control" id="assignedProject">
                    <!-- Options will be populated dynamically -->
                    </select>
                  </div>
        
                  <!-- Assigned Engineer (Read-only) -->
                  <div class="form-group">
                    <label for="assignedEngineer">Assigned Engineer</label>
                    <input type="text" class="form-control" id="assignedEngineer" readonly>
                  </div>

                  <div class="form-group">
                    <label for="projectPhase">Project Phase</label>
                    <input type="text" class="form-control" id="projectPhase" readonly>
                  </div>
        
                  <!-- Assignment Status (Editable by Manager Only) -->
                  <div class="form-group">
                    <label for="assignmentStatus">Assignment Status</label>
                    <select class="form-control" id="assignmentStatus" <?php echo ($userRole !== 'manager') ? 'disabled' : ''; ?>>
                      <option value="Ongoing">Ongoing</option>
                      <option value="Minor adjustment needed">Minor adjustment needed</option> 
                      <option value="Urgent">Urgent</option> 
                    </select>
                  </div>
        
                  <!-- Progress Notes / Comments -->
                  <div class="form-group">
                    <label for="progressNotes">Progress Notes</label>
                    <textarea class="form-control" id="progressNotes" rows="5" placeholder="Write any updates or comments here..." required></textarea>
                  </div>
        
                  <!-- File Upload (Optional) -->
                  <div class="form-group">
                    <label for="customFile">Attach Report (Optional)</label>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" disabled>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                 </div>
                 <small class="form-text text-muted">*The file submission function is currently unavailable.</small>
                 </div>
        
                  <!-- Deadline (Read-only) -->
                  <div class="form-group">
                    <label for="assignmentDeadline">Deadline</label>
                    <input type="date" class="form-control" id="assignmentDeadline" value="<php echo $assignmentDeadline; ?>" readonly>
                  </div>
        
                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-primary mt-3" id="submit-progress">Submit Progress</button>
                </form>
              </div>
            </div>
        
        <!-- Documentation Link -->
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>© 2024 黃伶俐/Cindy</p>
          </div>
        </div>

        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/project-management.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: 'php/read_projects.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          const projectList = $('#assignedProject');
          projectList.empty(); // Clear the existing list
          projectList.append(`<option disabled selected hidden>Select Project</option>`)
          response.forEach(project => {
            projectList.append(`<option value="${project.project_id}" data-engineer-name="${project.engineer_name}" data-engineer-id="${project.engineer_id}" data-status="${project.status}" data-phase="${project.phase}" data-deadline="${project.deadline}" data-notes="${project.notes}">${project.project_name}</option>`);
          });
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error); // Display error alert
        }
      });

      $('#assignedProject').on('change', function(event) {
        const selectedOption = $(this).find(':selected');

        const engineerName = selectedOption.data('engineer-name');
        $('#assignedEngineer').val(engineerName);

        const status = selectedOption.data('status');
        $('#assignmentStatus').val(status);

        const phase = selectedOption.data('phase');
        $('#projectPhase').val(phase);

        const deadline = selectedOption.data('deadline');
        $('#assignmentDeadline').val(deadline);

        const notes = selectedOption.data('notes');
        $('#progressNotes').val(notes);
      });

      $('#submit-progress').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        $.ajax({
          url: 'php/update_project.php', // URL to submit the form
          type: 'POST',
          data: {
            project_id: $('#assignedProject').val(),
            status: $('#assignmentStatus').val(),
            notes: $('#progressNotes').val()
          },
          success: function(response) {
            alert("Project updated successfully!"); // Display success alert
            location.reload();
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error); // Display error alert if necessary
          }
        });
      });
    });
  </script>
</body>

</body>

</html>