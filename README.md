# Project Management System

A web-based project management system designed to track engineers, manage project progress, and provide notifications for assistance needs. This system allows for efficient project tracking, communication, and reporting within a project-oriented organization.

## Technologies

- **MySQL**: Database management system
- **PHP, HTML, CSS, and JavaScript**: Technologies for frontend and backend development
- **Bootstrap and DataTables**: Libraries for enhanced user experience and data handling

# Project Features

## 📊 Dashboard  

### **Kanban Board**  

- Features drag-and-drop functionality for tasks across columns, enabling an intuitive and efficient workflow.  
- Serves as the **first page for meetings**, offering:  
  - Task assignment and organization for meeting agendas.  
  - Review of tasks discussed in previous meetings.  
  - Follow-up action planning by directly creating or updating tasks during discussions.  
- Provides a clear overview of project progress and team priorities.  

### **Mini Project Table**  

- Summarizes recent projects with insights into their current status and details.  

### **Notification Bar**    

- Positioned prominently for visibility, displaying updates and alerts about critical events.

## 👩‍💼 Management Tabs  

### **Project Management**  

- Create, assign, and edit projects with ease.  
- Includes tools for deadline tracking and real-time updates.  
- Offers a "Detail" button to view submissions and engineer notes.  

### **Engineer Directory**  

- Provides CRUD (Create, Read, Update, Delete) functionality for managing engineers.  
- Search and filter options make navigation and resource access efficient.  

## 📅 Meeting Page  

- Displays upcoming meetings in a clean and interactive calendar view.  
- Offers tools to add, edit, or delete meetings.  

## 📂 Submission Page  

- Provides a user-friendly interface for file uploads, ensuring smooth and error-free submissions.  
- Validates file formats and sizes for consistency.  
- Allows engineers to include notes about project updates, adding context to submissions.  

## 🔔 Notification System (Future Plan)  

### **Current Status**  
> Placeholder for future improvements.  

- Currently hardcoded and serves as a basic notification display.  

### **Future Development Goals**  
> Aiming for dynamic notifications.  

- Automatically report key activities like project changes and upcoming deadlines.  
- Notify users via an integrated activity feed or email alerts.  
- Leverage backend triggers and real-time updates for seamless notifications.


## Database Schema

The database schema for this project includes the following tables:

### Engineers
Stores information about engineers involved in projects.

```sql
CREATE TABLE Engineers (
    engineer_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    office VARCHAR(50),
    age INT,
    start_date DATE,
    salary DECIMAL(10, 2)
);
```

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/hnglingli/Project-management-system.git
   ```

## Demo

You can view the demo on website here: [hnglingli.com](https://hnglingli.com)
