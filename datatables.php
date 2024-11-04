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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">Project Management</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
            <a class="collapse-item active" href="datatables.html">DataTables</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="calendar.html">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Calendar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
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
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
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
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <!-- Replace DataTables heading with the form to add a new member -->
              <div class="col-lg-12 mb-4">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Member</h6>
                  <form action="test/add_engineers.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" id="position" name="position" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="form-group col-md-1">
                        <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="date" id="startDate" name="startDate" class="form-control" placeholder="Start Date" required>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" id="salary" name="salary" class="form-control" placeholder="Salary" required onblur="formatSalary(this)">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-custom">Add Member</button>
                    </div>
                      </div>
                  </form>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="thead-light">
  <tr>
    <th>Name</th>
    <th>Position</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
    <th></th>
  </tr>
</thead>
<tbody>
  <?php
  include 'test/manage_engineers.php';
  
  $sql = "SELECT engineer_id, name, position, age, start_date, salary FROM Engineers";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['name']) . "</td>";
          echo "<td>" . htmlspecialchars($row['position']) . "</td>";
          echo "<td>" . htmlspecialchars($row['age']) . "</td>";
          echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
          echo "<td>" . htmlspecialchars(number_format($row['salary'], 2)) . "</td>";
          echo "<td>
                  <a href='test/edit_engineers.php?id=" . $row['engineer_id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='test/delete_engineers.php?id=" . $row['engineer_id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                </td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='6'>No records found</td></tr>";
  }

  $conn->close();
  ?>
</tbody>
<tfoot>
  <tr>
    <th>Name</th>
    <th>Position</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
    <th></th>
  </tr>
</tfoot>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>© 2024 黃伶俐/Cindy</p>
            </div>

        <!---Container Fluid-->
        
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/project-management.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script>
$(document).ready(function () {
    // Destroy the existing DataTable instance if it exists
    if ($.fn.DataTable.isDataTable('#dataTableHover')) {
        $('#dataTableHover').DataTable().destroy();
    }
    
    // Initialize DataTable
    $('#dataTableHover').DataTable({
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
});
</script>

  <!-- JavaScript for formatting the salary input -->
<script>
  function formatSalary(input) {
    // Remove any non-digit characters for processing
    let value = input.value.replace(/,/g, '');
    if (!isNaN(value) && value !== '') {
      // Convert to a float, format to 2 decimal places, then add commas
      let formattedValue = parseFloat(value).toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
      input.value = formattedValue;
    }
  }
</script> 

</body>
</html>