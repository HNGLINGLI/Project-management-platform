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
              <form>
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
                  <button id="schedule-meeting">Schedule Meeting</button>
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
  
              <!-- Month Filter Dropdown -->
  <div id="month-filter-container">
    <label for="month-filter">Select Month:</label>
    <select id="month-filter">
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
  </div>

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

        <div class="modal fade" id="editMeeting" tabindex="-1" role="dialog" aria-labelledby="editMeetingLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editMeetingLabel">Edit Meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form">
                  <div class="form-group" hidden>
                      <label for="editId">ID</label>
                      <input type="text" id="editId" name="id" class="form-control" placeholder="id" required disabled>
                  </div>
                  <div class="form-group">
                      <label for="editEngineer">Engineer</label>
                      <input type="text" id="editEngineer" name="engineer" class="form-control" placeholder="Engineer" required disabled>
                  </div>
                  <div class="form-group">
                      <label for="editCustomer">Customer</label>
                      <input type="text" id="editCustomer" name="customer" class="form-control" placeholder="Customer" required>
                  </div>
                  <div class="form-group">
                      <label for="editDate">Date</label>
                      <input type="date" id="editDate" name="date" class="form-control" placeholder="Date" required>
                  </div>
                  <div class="form-group">
                      <label for="editTime">Time</label>
                      <input type="time" id="editTime" name="time" class="form-control" placeholder="Time" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-close-custom" data-dismiss="modal">Close</button>
                <button type="button" id="postEditMeeting" class="btn btn-primary btn-save-custom">Save changes</button>
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

  <script>
$(document).ready(function() {
    // Schedule Meeting creation
    $('#schedule-meeting').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        $.ajax({
            url: 'php/create_meeting.php', // URL to submit the form
            type: 'POST',
            data: {
                customer_name: $('#customer-name').val(),
                engineer_id: $('#user-name').val(),
                meeting_date: $('#meeting-date').val(),
                meeting_time: $('#meeting-time').val()
            },
            success: function(response) {
                alert("Meeting created successfully!"); // Display success alert
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + error); // Display error alert if necessary
            }
        });
    });

    // Edit Meeting functionality
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

    // Edit Meeting Modal Population
    $(document).on('click', '.editMeeting', function(event) {
        event.preventDefault(); // Prevent default behavior

        // Populate the modal fields with data from the clicked row
        $('#editId').val($(this).data("id"));
        $('#editEngineer').val($(this).data("engineer"));
        $('#editCustomer').val($(this).data("customer"));
        $('#editDate').val($(this).data("date"));
        $('#editTime').val($(this).data("time"));
    });

    // Search functionality
    const searchInput = document.getElementById('search-meetings');
    searchInput.addEventListener('input', function(event) {
        const searchText = event.target.value.toLowerCase();
        const meetingItems = document.querySelectorAll('#meetings-list .meeting-item');

        meetingItems.forEach(item => {
            const textContent = item.textContent.toLowerCase();
            if (textContent.includes(searchText)) {
                item.style.display = ''; // Show the item
            } else {
                item.style.display = 'none'; // Hide the item
            }
        });
    });

    // Filter meetings by selected month
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();

    function filterMeetingsByMonth() {
      const selectedMonth = parseInt(document.getElementById('month-filter').value);
      console.log("Selected Month: " + selectedMonth); // Check selected month value
      const meetingItems = document.querySelectorAll('#meetings-list .meeting-item');

        meetingItems.forEach(item => {
            const meetingDate = new Date(item.dataset.date); // Get the date from the data attribute
            const meetingMonth = meetingDate.getMonth();
            const meetingYear = meetingDate.getFullYear();

            console.log("Meeting Date: " + meetingDate.toISOString(), "Month: " + meetingMonth + ", Year: " + meetingYear);

            // Show the meeting if it matches the selected month and year
            if (meetingYear === currentYear && meetingMonth == selectedMonth) {
                item.style.display = ''; // Show the meeting
            } else {
                item.style.display = 'none'; // Hide the meeting
            }
        });
    }

    // Call the filter function when the page loads
    filterMeetingsByMonth();

    // Attach event listener to the month filter dropdown
    document.getElementById('month-filter').addEventListener('change', filterMeetingsByMonth);

    // Delete meeting functionality
    $(document).on('click', '.delete-meeting', function(event) {
        const confirmDelete = confirm('Are you sure you want to delete this meeting?');

        if (confirmDelete) {
            $.ajax({
                url: `php/delete_meeting.php?id=` + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    alert("Meeting deleted successfully!");
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        }
    });
});
</script>

</body>

</html>