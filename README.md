# Project Management System

A web-based project management system designed to track engineers, manage project progress, and provide notifications for assistance needs. This system allows for efficient project tracking, communication, and reporting within a project-oriented organization.

### Technologies Used

- **MySQL**: Core database for secure storage and efficient handling of project and engineer data.
- **PHP**: Backend server logic for data processing, form handling, and MySQL interaction.
- **HTML, CSS, JavaScript**: Structure, style, and interactive features, including drag-and-drop and dynamic updates.
- **Bootstrap**: Responsive, mobile-friendly design with a consistent, modern look.
- **DataTables**: Enhanced data display with pagination, sorting, and filtering for easy data navigation.

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

# Database Schema

This database schema is designed to manage engineers, their projects, and related meetings within a project management system.

## Tables and Relationships

1. **Engineers Table**
   - **Purpose**: Stores information about each engineer, including their name, position, age, start date, and salary.
   - **Primary Key**: `engineer_id`, which uniquely identifies each engineer.
<!-- Blank space -->

   ```sql
   CREATE TABLE engineers (
       engineer_id INT PRIMARY KEY AUTO_INCREMENT,
       name VARCHAR(100) NOT NULL,
       position VARCHAR(50) NOT NULL,
       age INT,
       start_date DATE,
       salary DECIMAL(10,2)
   );
   ```

2. **Meetings Table**
   - **Purpose**: Stores details about meetings, including the customer name, date, time, and the engineer assigned to each meeting.
   - **Relationships**: The `engineer_id` column is a foreign key that links each meeting to a specific engineer in the `engineers` table.
   - **Effect**: When an engineer is deleted from the `engineers` table, any related meetings will not automatically delete, allowing flexibility in retaining historical meeting records.
<!-- Blank space -->

   ```sql
   CREATE TABLE meetings (
       meeting_id INT PRIMARY KEY AUTO_INCREMENT,
       customer_name VARCHAR(100) NOT NULL,
       date DATE,
       time TIME,
       engineer_id INT,
       FOREIGN KEY (engineer_id) REFERENCES engineers(engineer_id)
   );
   ```

3. **Projects Table**
   - **Purpose**: Contains information about each project, including the project name, description, phase, status, start date, deadline, and additional notes.
   - **Primary Key**: `project_id` uniquely identifies each project.
<!-- Blank space -->

   ```sql
   CREATE TABLE projects (
       project_id INT PRIMARY KEY AUTO_INCREMENT,
       project_name VARCHAR(100) NOT NULL,
       description VARCHAR(100),
       phase VARCHAR(30),
       status VARCHAR(30),
       start_date DATE,
       deadline DATE,
       notes VARCHAR(100)
   );
   ```

4. **Project Engineers Table**
   - **Purpose**: Represents the assignment of engineers to projects, linking the `engineers` and `projects` tables in a many-to-many relationship.
   - **Composite Primary Key**: Combination of `project_id` and `engineer_id` ensures each engineer is uniquely associated with a project.
   - **Relationships**:
     - `project_id` is a foreign key linked to `projects`.
     - `engineer_id` is a foreign key linked to `engineers`.
   - **Effect**: With "ON DELETE CASCADE" enabled, deleting a project or engineer will automatically remove related records in this table, maintaining referential integrity.
<!-- Blank space -->

   ```sql
   CREATE TABLE project_engineers (
       project_id INT,
       engineer_id INT,
       PRIMARY KEY (project_id, engineer_id),
       FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE,
       FOREIGN KEY (engineer_id) REFERENCES engineers(engineer_id) ON DELETE CASCADE
   );
   ```
<!-- Blank space -->

## Schema Interactions

1. **Engineers and Meetings**:
   - Each meeting can involve one engineer, creating a one-to-many relationship between `engineers` and `meetings`. The `engineer_id` in the `meetings` table links to `engineers(engineer_id)` to indicate which engineer is assigned to a meeting.

2. **Projects and Engineers (via Project Engineers)**:
   - Engineers can work on multiple projects, and each project can have multiple engineers. This many-to-many relationship is implemented through the `project_engineers` table.
   - The composite primary key of `project_id` and `engineer_id` ensures each engineer is uniquely assigned to each project.
   - With cascading deletions, removing an engineer or project will automatically delete corresponding rows in `project_engineers`, maintaining clean and consistent data.

3. **Indexes for Efficiency**:
   - **Engineers**: Indexed by `engineer_id` for quick lookup.
   - **Meetings**: Indexed by `meeting_id` and `engineer_id`, enabling efficient queries based on meeting details and engineer associations.
   - **Projects**: Indexed by `project_id`.
   - **Project Engineers**: Composite index on `project_id` and `engineer_id` enables efficient retrieval of engineers assigned to projects.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/hnglingli/Project-management-system.git
   ```

## Demo

You can view the demo on website here: [hnglingli.com](https://hnglingli.com)
