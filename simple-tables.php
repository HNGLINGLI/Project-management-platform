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
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
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
      <!-- Status Tables Header Row -->
      <div class="d-sm-flex align-items-start">
        <h1 class="h3 mb-0 text-gray-800">Status Tables</h1>
      </div>
      <!-- Big Button aligned on the right with spacing -->
      <div>
        <button type="button" class="btn btn-primary btn-lg ms-3" data-toggle="modal" data-target="#createProjectModal" id="create-new-project">
          + Create New Project
        </button>
      </div>
    </div>

    <div class="col-lg-12 mb-4">

              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Engineer project status table</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Project Name</th>
                        <th>Engineer</th>
                        <th>Project Description</th>
                        <th>Phase</th>
                        <th>Start Date</th>
                        <th>Deadline</th>
                        <th style="width: 100px"></th>
                      </tr>
                    </thead>
                    <tbody id="project-list">
                      <!-- <tr>
                        <td><a href="#" title="Download project details">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA5324</a></td>
                        <td>Jaenab Bajigur</td>
                        <td>Gundam 90' Edition</td>
                        <td><span class="badge badge-warning">Shipping</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA8568</a></td>
                        <td>Rivat Mahesa</td>
                        <td>Oblong T-Shirt</td>
                        <td><span class="badge badge-danger">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1453</a></td>
                        <td>Indri Junanda</td>
                        <td>Hat Rounded</td>
                        <td><span class="badge badge-info">Processing</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1998</a></td>
                        <td>Udin Cilok</td>
                        <td>Baby Powder</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">Detail</a></td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Project Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div>
          <h6>Latest Report</h6>
          <p id="latest-report">No recent report available.</p>
        </div>
        <hr> -->
        <div>
          <h6>Engineer Notes</h6>
          <p id="engineer-notes">No notes provided.</p>
        </div>
        <div id="see-more-section">
  <hr>
  <h6>Additional Details</h6>
  <p>Last Report: <a href="#" title="Data not available!" id="last-report-link"><strong>Click here to see the newest report</strong></a></p>
</div>
<button 
  id="see-more-btn" 
  class="btn" 
  title="Data also not available!" 
  style="background-color: #ffffff; color: rgb(169, 81, 81); font-size: 1rem; border: none; padding: 5px 10px; cursor: pointer; transition: background-color 0.3s ease;"
>
  See more >>
</button>

      </div>
      <div class="modal-footer">
  <div class="modal-note">
    <p class="text-muted mb-0 text-left" style="font-size: 0.85rem;">
      <em>Note: File submission and database functionality are not implemented. Submissions cannot be viewed.</em>
    </p>
  </div>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- create project modal Structure -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProjectModalLabel">Create New Project</h5>
        <!-- Close button with the 'X' icon -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> <!-- "X" symbol -->
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Project Name -->
          <div class="mb-3">
            <label for="projectName" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="projectName" required>
          </div>

          <!-- Project Description -->
          <div class="mb-3">
            <label for="projectDescription" class="form-label">Project Description</label>
            <input type="text" class="form-control" id="projectDescription" required>
          </div>

          <!-- Assigned Engineers (multi-select) -->
          <div class="mb-3">
            <label for="assignedEngineers" class="form-label">Assigned Engineers</label>
            <select multiple class="form-control" id="assignedEngineers">
            <!-- Options will be populated dynamically -->
            </select>
          </div>

          <!-- Project Phase -->
          <div class="mb-3">
            <label for="projectPhase" class="form-label">Phase</label>
            <select class="form-control" id="projectPhase">
              <option value="" disabled selected hidden>Select Phase</option>
              <option>Not Started</option>
              <option>In Progress</option>
              <option>Completed</option>
              <option>Pending</option> 
              <option>Urgent</option> 
            </select>
          </div>

          <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startDate" required>
          </div>

          <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" class="form-control" id="deadline" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-project">Save Project</button>
      </div>
    </div>
  </div>
</div>

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>© 2024 黃伶俐/Cindy</p>
            </div>

        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="editProjectLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProjectLabel">Edit Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form">
            <div class="form-group" hidden>
                <label for="editId">ID</label>
                <input type="text" id="editId" name="id" class="form-control" placeholder="ID" required disabled>
            </div>
            <div class="form-group">
                <label for="editName">Project Name</label>
                <input type="text" id="editName" name="name" class="form-control" placeholder="Project Name" required>
            </div>
            <div class="form-group">
                <label for="editEngineer">Engineer</label>
                <!-- <input type="text" id="editEngineer" name="name" class="form-control" placeholder="Engineer" required> -->
                <select multiple class="form-control" id="editEngineer">
                <!-- Options will be populated dynamically -->
                </select>
            </div>
            <div class="form-group">
                <label for="editDescription">Description</label>
                <input type="text" id="editDescription" name="description" class="form-control" placeholder="Description" required>
            </div>
            <div class="form-group">
                <label for="editPhase">Phase</label>
                <select class="form-control" id="editPhase" name="phase" required>
                  <option value="" disabled selected hidden>Select Phase</option>
                  <option>Not Started</option>
                  <option>In Progress</option>
                  <option>Completed</option>
                  <option>Pending</option>
                  <option>Urgent</option>
                  <option>Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editDeadline">Deadline</label>
                <input type="date" id="editDeadline" name="deadline" class="form-control" placeholder="Deadline" required>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <div>
            <button type="button" class="btn btn-danger" id="deleteProject">Delete Project</button>
          </div>
          <div>
            <button type="button" class="btn btn-custom-outline" data-dismiss="modal">Close</button>
            <button type="button" id="postEditProject" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <script>    
    function loadUsers() {
      const userSelect = document.getElementById('assignedEngineers');
      const editEngineer = document.getElementById('editEngineer');
      userSelect.innerHTML = `<option value="" disabled selected hidden>Select User</option>`;

      fetch('php/read_users.php')
        .then(response => response.json())
        .then(data => {
          console.log('Users loaded:', data);
          if (data) {
            data.forEach(user => {
              const option = document.createElement('option');
              option.value = user.id;
              option.textContent = user.name;
              userSelect.appendChild(option);
            });
          }
        })
        .catch(err => console.error('Error loading users:', err));
    }

    function loadUsersEdit() {
        return new Promise((resolve, reject) => {
            const userSelect = document.getElementById('editEngineer');
            userSelect.innerHTML = `<option value="" disabled selected hidden>Select User</option>`;

            fetch('php/read_users.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Users loaded:', data);
                    if (data) {
                        data.forEach(user => {
                            const option = document.createElement('option');
                            option.value = user.id;
                            option.textContent = user.name;
                            userSelect.appendChild(option);
                        });
                    }
                    resolve(); // Resolve the promise after populating the dropdown
                })
                .catch(err => {
                    console.error('Error loading users:', err);
                    reject(err); // Reject the promise if there's an error
                });
        });
    }

    $(document).on('click', '#create-new-project', function(event) {
      event.preventDefault(); // Prevent default behavior      
      loadUsers()
    });

    $(document).ready(function() {
      $('#save-project').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        $.ajax({
          url: 'php/create_project.php', // URL to submit the form
          type: 'POST',
          data: {
            project_name: $('#projectName').val(),
            engineer_id: $('#assignedEngineers').val(),
            description: $('#projectDescription').val(),
            phase: $('#projectPhase').val(),
            start_date: $('#startDate').val(),
            deadline: $('#deadline').val()
          },
          success: function(response) {
            alert("Project created successfully!"); // Display success alert
            location.reload();
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error); // Display error alert if necessary
          }
        });
      });

      $.ajax({
        url: 'php/read_projects.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          const projectList = $('#project-list');
          projectList.empty(); // Clear the existing list
          data = []
          response.forEach(project => {
            content = []
            content.push(project.project_name)
            content.push(project.engineer_name)
            content.push(project.description)
            content.push(`<span class="badge badge-${project.phase === 'Urgent' ? 'danger' : project.phase === 'Completed' ? 'success' : project.phase === 'Pending' ? 'warning': project.phase === 'Not Started' ? 'secondary' : project.phase === 'Cancelled' ? 'secondary' : 'primary'}">${project.phase}</span>`)
            content.push(project.start_date)
            content.push(project.deadline)
            content.push(`<a href='#' data-id='${project.project_id}' data-name='${project.project_name}' data-engineer='${project.engineer_name}' data-description='${project.description}' data-phase='${project.phase}' data-deadline='${project.deadline}' class='editProject btn btn-sm btn-warning' data-toggle='modal' data-target='#editProject'>Edit</a>&nbsp;<a href="#" class="btn btn-sm btn-primary detailButton" data-toggle="modal" data-target="#detailModal" data-id="${project.project_id}" data-notes="${project.notes}" data-project="${project.project_name}">Detail</a>`)
            data.push(content)
            // projectList.append(`
            //   <tr>
            //     <td>${project.project_name}</td>
            //     <td>${project.engineer_name}</td>
            //     <td>${project.description}</td>
            //     <td><span class="badge badge-${project.phase === 'Urgent' ? 'danger' : project.phase === 'Completed' ? 'success' : 'primary'}">${project.phase}</span></td>
            //     <td>${project.start_date}</td>
            //     <td>${project.deadline}</td>
            //     <td>
            //       <a href='#' data-id='${project.project_id}' data-name='${project.project_name}' data-engineer='${project.engineer_name}' data-description='${project.description}' data-phase='${project.phase}' data-deadline='${project.deadline}' class='editProject btn btn-sm btn-warning' data-toggle='modal' data-target='#editProject'>Edit</a>
            //       <a href="#" class="btn btn-sm btn-primary detailButton" data-toggle="modal" data-target="#detailModal" data-id="${project.project_id}" data-notes="${project.notes}" data-project="${project.project_name}">Detail</a>
            //     </td>
            //   </tr>`
            // );
          });

          // Destroy the existing DataTable instance if it exists
          if ($.fn.DataTable.isDataTable('#dataTableHover')) {
              $('#dataTableHover').DataTable().destroy();
          }
          
          // Initialize DataTable
          $('#dataTableHover').DataTable({
              data: data,
              "paging": true, 
              "searching": true,
              "ordering": true,
              "lengthChange": true, 
              "info": true,
              "autoWidth": false,
              "pageLength": 10,
              "lengthMenu": [10, 25, 50, 100], 
              "columnDefs": [
                  { "orderable": false, "targets": -1 }
              ]
          });
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error); // Display error alert
        }
      });

      $(document).on('click', '.detailButton', function(event) {
        const project_name = $(this).data('project') || 'Project Name';
        $('#detailModalLabel').text(project_name);

        const notes = $(this).data('notes') || 'No notes provided.';
        $('#engineer-notes').text(notes);
      });

      $('#postEditProject').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        $.ajax({
          url: 'php/update_project2.php', // URL to submit the form
          type: 'POST',
          data: {
            id: $('#editId').val(),
            name: $('#editName').val(),
            engineer: $('#editEngineer').val(),
            description: $('#editDescription').val(),
            phase: $('#editPhase').val(),
            deadline: $('#editDeadline').val(),
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

      $('#deleteProject').on('click', function(event) {
        const confirmDelete = confirm('This project, notes, and all the submissions are going to be lost forever. Are you sure?');

        if(confirmDelete) {
          $.ajax({
            url: `php/delete_projects.php?id=` +  $('#editId').val(), // URL to submit the form
            type: 'GET',
            success: function(response) {
              alert("Project deleted successfully!"); // Display success alert
              location.reload();
            },
            error: function(xhr, status, error) {
              alert("An error occurred: " + error); // Display error alert if necessary
            }
          });
        }
      });
    });

    $(document).on('click', '.editProject', function(event) {
      event.preventDefault(); // Prevent default behavior
      const projectEngineers = $(this).data("engineer").split(',').map(name => name.trim()); // Split and trim engineer names
      loadUsersEdit().then(() => {
          const userSelect = document.getElementById('editEngineer');
          const options = userSelect.options;

          // Iterate through the options and mark them as selected if they match the project engineers
          for (let i = 0; i < options.length; i++) {
              if (projectEngineers.includes(options[i].textContent)) {
                  options[i].selected = true;
              }
          }
      });
      
      // Populate the modal fields with data from the clicked row
      $('#editId').val($(this).data("id"));
      $('#editName').val($(this).data("name"));
      $('#editDescription').val($(this).data("description"));
      $('#editPhase').val($(this).data("phase"));
      $('#editDeadline').val($(this).data("deadline"));
    });
  </script>

</body>

</html>