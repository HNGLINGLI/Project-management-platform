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
  <link rel="stylesheet" href="css/kanban.css" />
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
            <li class="nav-item dropdown no-arrow" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" id="searchInput" 
                           class="form-control bg-light border-1 small"
                           placeholder="Type to search..." 
                           aria-label="Search" 
                           style="border-color: #615751;">
                  </div>
                </form>
              </div>
            </li>
      
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">  
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid -->
    <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Welcome, 歡迎！</h1>
    </div>
  
    <div class="row mb-3">
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card h-100">
          <!-- Card Header with title, description, and input form -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="info-container">
              <h1>Kanban Board</h1>
              <p>A place to organize tasks to completion as well as add new ones and delete old ones.</p>
              <p><strong>Note:</strong> This feature is only available on tablet or laptop devices.</p>
            </div>
            <form class="kanban-section input-container" onsubmit="return addTask(event);">
              <div class="fields">
                <input id="title" placeholder="title..." required />
                <input id="description" placeholder="description..." required />
              </div>
              <input type="submit" id="submit-button" value="Add Task" style="width: 100px; border: none; background-color: #938275; color: #ffffff; border-radius: 10px; padding: 10px 15px; cursor: pointer; font-weight: normal; transition: background-color 0.3s, transform 0.2s;" />
            </form>
          </div>          
    
          <!-- Card Body for the Kanban Columns -->
          <div class="kanban-card-body">
            <div class="row">
            <section class="column-container">
              <div class="task-column" id="backlog">
                <h3>📝 To-do</h3>
                <hr class="custom-hr" />
                <div class="task-list"></div>
              </div>
    
              <div class="task-column" id="doing">
                <h3>⌛ Doing</h3>
                <hr class="custom-hr" />
                <div class="task-list"></div>
              </div>
    
              <div class="task-column" id="done">
                <h3>👍 Done</h3>
                <hr class="custom-hr" />
                <div class="task-list"></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>    

            <!-- Engineer project status Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Engineer project status</h6>
                  <a class="m-0 float-right btn btn-info btn-sm" href="simple-tables.php">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Project Name</th>
                        <th>Engineer</th>
                        <th>Project Description</th>
                        <th>Phase</th>
                        <th>Deadline</th>
                      </tr>
                    </thead>
                    <tbody id="project-list">
                      <!-- <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td><span class="badge badge-success">Delivered</span></td>                        
                      </tr>
                      <tr>
                        <td><a href="#">RA5324</a></td>
                        <td>Jaenab Bajigur</td>
                        <td>Gundam 90' Edition</td>
                        <td><span class="badge badge-warning">Shipping</span></td>                        
                      </tr>
                      <tr>
                        <td><a href="#">RA8568</a></td>
                        <td>Rivat Mahesa</td>
                        <td>Oblong T-Shirt</td>
                        <td><span class="badge badge-danger">Pending</span></td>                        
                      </tr>
                      <tr>
                        <td><a href="#">RA1453</a></td>
                        <td>Indri Junanda</td>
                        <td>Hat Rounded</td>
                        <td><span class="badge badge-info">Processing</span></td>                        
                      </tr>
                      <tr>
                        <td><a href="#">RA1998</a></td>
                        <td>Udin Cilok</td>
                        <td>Baby Powder</td>
                        <td><span class="badge badge-success">Delivered</span></td>                        
                      </tr>
                      <tr>
                        <td><a href="#">RB2000</a></td>
                        <td>Cindy Huang</td>
                        <td>Baby Powder</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            <!-- Notification Messages-->
            <div class="col-xl-4 col-lg-5 ">
              <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Notification from engineer</h6>
                </div>
                <div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="notif.html">
                      <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a
                        problem I've been having.</div>
                      <div class="small text-gray-500 message-time font-weight-bold">Alice · 20m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="notif.html">
                      <div class="text-truncate message-title">I have uploaded a new file into the project.
                      </div>
                      <div class="small text-gray-500 message-time font-weight-bold">Grace · 30m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="notif.html">
                      <div class="text-truncate message-title">Please help me check if the files went through.
                      </div>
                      <div class="small text-gray-500 message-time font-weight-bold">Cindy · 40m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="notif.html">
                      <div class="text-truncate message-title">Thank you very much for this very satisfying transaction.
                      </div>
                      <div class="small text-gray-500 message-time font-weight-bold">David · 54m</div>
                    </a>
                  </div>
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="notif.html">View More <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/kanban.js"></script>  

<script>
  function highlightText() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    
    // Select all elements inside the container you want to search in
    const contentElements = document.querySelectorAll(".info-container p, .card-header p, .content p");
  
  
    contentElements.forEach(element => {
      // Remove existing highlights
      element.innerHTML = element.textContent;
  
      // Highlight matched text if input exists
      if (input && element.textContent.toLowerCase().includes(input)) {
        const regex = new RegExp(`(${input})`, 'gi');
        element.innerHTML = element.textContent.replace(regex, '<span class="highlight">$1</span>');
      }
    });
  }

  $(document).ready(function() {
      $.ajax({
        url: 'php/read_projects.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          const projectList = $('#project-list');
          projectList.empty(); // Clear the existing list
          response.forEach(project => {
            projectList.append(`
              <tr>
                <td>${project.project_name}</td>
                <td>${project.engineer_name}</td>
                <td>${project.description}</td>
                <td><span class="badge badge-${project.phase === 'Urgent' ? 'danger' : 'primary'}">${project.phase}</span></td>
                <td>${project.deadline}</td>
              </tr>`
            );
          });
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error); // Display error alert
        }
      });
    });
</script>

</body>

</html>