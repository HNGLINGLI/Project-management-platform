# Project Management System

A web-based project management system designed to track engineers, manage project progress, and provide notifications for assistance needs. This system allows for efficient project tracking, communication, and reporting within a project-oriented organization.

## Technologies

- **MySQL**: Database management system
- **PHP, HTML, CSS, and JavaScript**: Technologies for frontend and backend development
- **Bootstrap and DataTables**: Libraries for enhanced user experience and data handling

## Features

- **Engineers Database**: Allows you to add, delete, sort, and edit engineer data, including their name, position, office, age, start date, and salary.
- **Projects Database**: Manages information about each project, such as project name, description, start and end dates, and current status.
- **Progress Reporting**: Engineers can log progress reports for their assigned projects, including updates and requests for assistance.
- **Notification System**: Provides a mechanism for engineers to notify project managers when assistance is required, ensuring timely support and resource allocation.

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
