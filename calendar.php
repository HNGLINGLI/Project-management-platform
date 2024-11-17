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
  <link rel="stylesheet" href="css/calendarstyle.css"> <!-- Link to the CSS file -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMYBmlrS8eV67/m2MY1nH0o2ZgJZxZ3L5DZrV" crossorigin="anonymous">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/project-management.css" rel="stylesheet">
  <script defer src="js/calendarscript.js"></script> <!-- Link to the JavaScript file -->
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
                  <input type="text" id="search-meetings" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
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
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Container Fluid (Calendar Section) -->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>

          <!-- Calendar HTML -->
          <div class="container">
            <div class="form-container">
              <h1>Schedule a Meeting</h1>
              <form id="meeting-form">
                  <div class="form-group">
                      <label for="user-name">User Name:</label>
                      <select id="user-name" required></select>
                  </div>
                  <div class="form-group">
                      <label for="customer-name">Customer Name:</label>
                      <input type="text" id="customer-name" required>
                  </div>
                  <div class="form-group">
                      <label for="meeting-date">Date:</label>
                      <input type="date" id="meeting-date" required>
                  </div>
                  <div class="form-group">
                      <label for="meeting-time">Time:</label>
                      <input type="time" id="meeting-time" required>
                  </div>
                  <button type="submit">Schedule Meeting</button>
              </form>
            </div>
            <div class="calendar-container">
              <h2>Meeting Calendar</h2>
              <div id="calendar-controls">
                <button id="prev-month" aria-label="Previous Month">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M15.5 18.5l-6.5-6.5 6.5-6.5v13z"/>
                  </svg>
                </button>
                <span id="current-month-year"></span>
                <button id="next-month" aria-label="Next Month">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.5 5.5l6.5 6.5-6.5 6.5v-13z"/>
                  </svg>
                </button>
              </div>
              <div id="calendar">
                <!-- Calendar will be generated by JavaScript -->
              </div>
              <h2 style="margin-top: 64px">Upcoming Meetings</h2>
              <div id="meetings-list"></div>
            </div>
          </div>    
          <!--Row-->
        </div>
        
        <!-- Documentation Link -->
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>© 2024 黃伶俐/Cindy</p>
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

  <script>
    $(document).ready(function() {
      $('#postEditMeeting').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        $.ajax({
          url: 'php/update_meeting.php', // URL to submit the form
          type: 'POST',
          data: {
            meeting_id: $('#editId').val(),
            customer_name: $('#editCustomer').val(),
            meeting_date: $('#editDate').val(),
            meeting_time: $('#editTime').val()
          },
          success: function(response) {
            alert("Meeting updated successfully!"); // Display success alert
            location.reload();
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error); // Display error alert if necessary
          }
        });
      });
    });

    $(document).on('click', '.editMeeting', function(event) {
      event.preventDefault(); // Prevent default behavior
        
        // Populate the modal fields with data from the clicked row
        $('#editId').val($(this).data("id"));
        $('#editEngineer').val($(this).data("engineer"));
        $('#editCustomer').val($(this).data("customer"));
        $('#editDate').val($(this).data("date"));
        $('#editTime').val($(this).data("time"));
      });

      document.addEventListener('DOMContentLoaded', () => {
      // Load meetings initially
      loadMeetings();

      // Get the search input element
      const searchInput = document.getElementById('search-meetings');

      // Add event listener for input event
      searchInput.addEventListener('input', function(event) {
          const searchText = event.target.value.toLowerCase(); // Get the search text in lowercase
          const meetingItems = document.querySelectorAll('#meetings-list .meeting-item');

          // Loop through all meeting items and show/hide based on search text
          meetingItems.forEach(item => {
              const textContent = item.textContent.toLowerCase(); // Get the text content of the meeting item
              if (textContent.includes(searchText)) {
                  item.style.display = ''; // Show the item
              } else {
                  item.style.display = 'none'; // Hide the item
              }
          });
      });
    });
  </script>

</body>

</html>