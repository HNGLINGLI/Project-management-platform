// Load users and meetings when the page loads
window.onload = () => {
    loadUsers();
    generateCalendar();
};

let currentMonth = new Date().getMonth(); // Current month (0-11)
let currentYear = new Date().getFullYear(); // Current year

function loadUsers() {
    const userSelect = document.getElementById('user-name');
    userSelect.innerHTML = `<option value="">Select User</option><option value="add-user">Add New User</option>`;

    fetch('read_users.php')
        .then(response => response.json())
        .then(data => {
            console.log('Users loaded:', data); // Log the loaded users
            if (data) {
                data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id; // Assuming the user ID is in the response
                    option.textContent = user.name; // Assuming the user name is in the response
                    userSelect.appendChild(option);
                });
            }
        })
        .catch(err => console.error('Error loading users:', err)); // Catch fetch errors
}

function loadMeetings() {
    const meetingsList = document.getElementById('meetings-list');
    meetingsList.innerHTML = ''; // Clear previous meetings
    fetch('read_meetings.php')
        .then(response => response.json())
        .then(data => {
            console.log('Meetings loaded:', data); // Log the loaded meetings
            if (data) {
                data.forEach(meeting => {
                    const meetingItem = document.createElement('div');
                    meetingItem.className = 'meeting-item';
                    meetingItem.innerHTML = `
                        <strong>${meeting.customerName}</strong><br>
                        ${meeting.date} at ${meeting.time} <button class="edit-btn">Edit</button><button class="delete-btn">Delete</button>
                    `;
                    meetingsList.appendChild(meetingItem);
                });
            }
        })
        .catch(err => console.error('Error loading meetings:', err)); // Catch fetch errors
}

// Generate calendar
function generateCalendar() {
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = ''; // Clear the calendar before regenerating

    const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
    const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
    
    const daysInMonth = lastDayOfMonth.getDate();
    const startDay = firstDayOfMonth.getDay();

    // Update current month and year display
    document.getElementById('current-month-year').textContent = `${firstDayOfMonth.toLocaleString('default', { month: 'long' })} ${currentYear}`;

    // Create empty slots for days before the first day of the month
    for (let i = 0; i < startDay; i++) {
        const emptyElement = document.createElement('div');
        emptyElement.classList.add('calendar-day', 'empty');
        calendar.appendChild(emptyElement);
    }

    // Generate days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('calendar-day');
        dayElement.textContent = day;
        dayElement.dataset.date = day; // Add data attribute for the date
        dayElement.dataset.month = currentMonth; // Add month
        dayElement.dataset.year = currentYear; // Add year
        calendar.appendChild(dayElement);
    }

    // Load meetings for the current month
    loadMeetings();
}

// Handle month navigation
document.getElementById('prev-month').addEventListener('click', () => {
    if (currentMonth === 0) {
        currentMonth = 11; // December
        currentYear -= 1;
    } else {
        currentMonth -= 1;
    }
    generateCalendar();
});

document.getElementById('next-month').addEventListener('click', () => {
    if (currentMonth === 11) {
        currentMonth = 0; // January
        currentYear += 1;
    } else {
        currentMonth += 1;
    }
    generateCalendar();
});

function showMeetingsTooltip(event) {
    const dayElement = event.currentTarget;
    const date = dayElement.dataset.date;
    const month = dayElement.dataset.month;
    const year = dayElement.dataset.year;

    console.log(`Fetching meetings for date: ${year}-${month + 1}-${date}`); // Log the date being fetched

    fetch(`read_meetings.php?date=${year}-${month + 1}-${date}`)
        .then(response => response.json())
        .then(meetingsToday => {
            console.log('Meetings for today:', meetingsToday); // Log the meetings fetched
            if (meetingsToday.length > 0) {
                let tooltip = document.createElement('div');
                tooltip.className = 'meeting-tooltip';
                tooltip.innerHTML = `Meetings: ${meetingsToday.join(', ')}`;
                dayElement.appendChild(tooltip);
            }
        })
        .catch(err => console.error('Error fetching meetings:', err)); // Catch fetch errors
}

// Hide meetings tooltip on mouse leave
function hideMeetingsTooltip(event) {
    const dayElement = event.currentTarget;
    const tooltip = dayElement.querySelector('.meeting-tooltip');
    if (tooltip) {
        dayElement.removeChild(tooltip);
    }
}

// Add event listener for tooltip functionality
document.getElementById('calendar').addEventListener('mouseover', showMeetingsTooltip);
document.getElementById('calendar').addEventListener('mouseout', hideMeetingsTooltip);

// Handle form submission
document.getElementById('meeting-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const userName = document.getElementById('user-name').value;
    const newUserName = document.getElementById('new-user-name').value;
    const customerName = document.getElementById('customer-name').value;
    const meetingDate = document.getElementById('meeting-date').value; // Get date from the input field
    const meetingTime = document.getElementById('meeting-time').value;

    const meetingData = {
        userId: userName === 'add-user' ? newUserName : userName,
        customerName,
        date: meetingDate,
        time: meetingTime
    };

    // Create meeting to the server via PHP
    fetch('php/create_meeting.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(meetingData) // Send meeting data as JSON
    })    
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Meeting scheduled successfully!');
                document.getElementById('meeting-form').reset();
                loadMeetings();
            } else {
                alert('Failed to schedule meeting.');
            }
        })
        .catch((error) => {
            console.error('Error scheduling meeting:', error);
            alert('Failed to schedule meeting.');
        });
});

// Load meetings from PHP
function loadMeetings() {
    const meetingsList = document.getElementById('meetings-list');
    meetingsList.innerHTML = ''; // Clear previous meetings
    fetch('php/read_meetings.php')
        .then(response => response.json())
        .then(data => {
            if (data) {
                data.forEach(meeting => {
                    const meetingItem = document.createElement('div');
                    meetingItem.className = 'meeting-item';
                    meetingItem.innerHTML = `
                        <strong>${meeting.customerName}</strong><br>
                        ${meeting.date} at ${meeting.time} <button class="edit-btn" data-id="${meeting.id}">Edit</button>
                        <button class="delete-btn" data-id="${meeting.id}">Delete</button>
                    `;
                    meetingsList.appendChild(meetingItem);
                });
            }
        })
        .catch(err => console.error('Error loading meetings:', err));

    // Add event listener for edit and delete buttons
    meetingsList.addEventListener('click', (event) => {
        if (event.target.classList.contains('edit-btn')) {
            const meetingId = event.target.dataset.id; // Get the meeting ID
            handleEdit(meetingId); // Call edit function
        } else if (event.target.classList.contains('delete-btn')) {
            const meetingId = event.target.dataset.id; // Get the meeting ID
            handleDelete(meetingId); // Call delete function
        }
    });
}

// Function to handle edit functionality
function handleEdit(meetingId) {
    console.log(`Edit meeting with ID: ${meetingId}`);
    // Implement your edit logic here, such as opening a modal to edit meeting details
}

// Function to handle delete functionality
function handleDelete(meetingId) {
    const confirmDelete = confirm('Are you sure you want to delete this meeting?');
    if (confirmDelete) {
        // Call your delete API here
        fetch(`delete_meeting.php?id=${meetingId}`, { method: 'DELETE' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Meeting deleted successfully.');
                    loadMeetings(); // Refresh the meeting list
                } else {
                    alert('Failed to delete meeting.');
                }
            })
            .catch(err => console.error('Error deleting meeting:', err));
    }
}

// Event listeners for adding new user
document.getElementById('user-name').addEventListener('change', (event) => {
    const selectedValue = event.target.value;
    const newUserNameField = document.getElementById('new-user-name');

    if (selectedValue === 'add-user') {
        newUserNameField.style.display = 'block';
    } else {
        newUserNameField.style.display = 'none';
    }
});