// Load users and meetings when the page loads
window.onload = () => {
    loadUsers();
    generateCalendar();
};

let currentMonth = new Date().getMonth(); // Current month (0-11)
let currentYear = new Date().getFullYear(); // Current year

function loadUsers() {
    const userSelect = document.getElementById('user-name');
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
        .catch(err => console.error('Error loading users:', err)); // Catch fetch errors
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
    const date = firstDayOfMonth;
    const year = date.getFullYear()
    const month = date.toLocaleString('default', { month: 'long' })
    const monthNumber = date.getMonth() + 1
    document.getElementById('month-filter').value = monthNumber
    document.getElementById('current-year').value = year
    loadMeetings(month, year);
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

    fetch(`php/read_meetings.php`)
        .then(response => response.json())
        .then(meetingsToday => {
            console.log('Meetings for today:', meetingsToday); // Log the meetings fetched
            if (meetingsToday.length > 0) {
                let tooltip = document.createElement('div');
                tooltip.className = 'meeting-tooltip';
                tooltip.innerHTML = `Meetings:`;
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

// Handle form submission
document.getElementById('meeting-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const engineerId = document.getElementById('user-name').value;
    // const newUserName = document.getElementById('new-user-name').value;
    const customerName = document.getElementById('customer-name').value;
    const meetingDate = document.getElementById('meeting-date').value; // Get date from the input field
    const meetingTime = document.getElementById('meeting-time').value;

    const meetingData = {
        customer_name: customerName,
        meeting_date: meetingDate,
        meeting_time: meetingTime,
        engineer_id: engineerId
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
            console.log('test', data)
            if (data.success) {
                alert('Meeting scheduled successfully!');
                document.getElementById('meeting-form').reset();
                location.reload();
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
function loadMeetings(month, year) {
    const meetingsList = document.getElementById('meetings-list');
    meetingsList.innerHTML = ''; // Clear previous meetings
    fetch('php/read_meetings.php?month=' + month + '&year=' + year)
        .then(response => response.json())
        .then(data => {
            if (data) {
                data.forEach(meeting => {
                    const meetingDate = meeting.date.split("-");
                    const year = meetingDate[0]
                    const month = (meetingDate[1] - 1)
                    const date = parseInt(meetingDate[2], 10)
                    const meetingDay = document.querySelector(`.calendar-day[data-date="${date}"][data-month="${month}"][data-year="${year}"]`);
                    if(meetingDay) {
                        meetingDay.style.backgroundColor = "#615751";
                        meetingDay.style.color = "white";
                    }
                    const meetingItem = document.createElement('div');
                    meetingItem.className = 'meeting-item';
                    meetingItem.innerHTML = `
                        <strong>${meeting.engineer_name}</strong> with ${meeting.customer_name}<br>
                        ${meeting.date} at ${meeting.time} <button class="edit-btn editMeeting" data-id="${meeting.meeting_id}" data-engineer="${meeting.engineer_name}" data-customer="${meeting.customer_name}" data-date="${meeting.date}" data-time="${meeting.time}" data-toggle="modal" data-target="#editMeeting">Edit</button>
                        <button class="delete-btn delete-meeting" data-id="${meeting.meeting_id}">Delete</button>
                    `;
                    meetingsList.appendChild(meetingItem);
                });
            }
        })
        .catch(err => console.error('Error loading meetings:', err));
}

// Function to handle edit functionality
function handleEdit(meetingId) {
    console.log(`Edit meeting with ID: ${meetingId}`);
    // Implement your edit logic here, such as opening a modal to edit meeting details
}