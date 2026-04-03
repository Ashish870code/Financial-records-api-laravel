Task Management API

📌 Overview

This is a simple backend API built using Laravel. It allows users to create, read, update, and delete tasks. The project demonstrates proper backend structure, validation, error handling, and database management.

---

🚀 Features

- Create Task
- Get All Tasks (with pagination)
- Update Task
- Delete Task
- Input Validation
- Proper HTTP Status Codes
- Structured JSON Responses

---

🛠️ Tech Stack

- PHP (Laravel)
- SQLite Database

---

⚙️ Setup Instructions

1. Clone the repository

2. Install dependencies:
   composer install

3. Create environment file:
   cp .env.example .env

4. Generate app key:
   php artisan key:generate

5. Run migrations:
   php artisan migrate

6. Start server:
   php artisan serve

---

📡 API Endpoints

Create Task

POST /api/tasks

Get Tasks

GET /api/tasks

Update Task

PUT /api/tasks/{id}

Delete Task

DELETE /api/tasks/{id}

---

🧠 Design Decisions

- Used MVC structure for clean separation
- Used validation for data integrity
- Used pagination for better performance
- Used proper HTTP status codes

---

✨ Optional Improvements

- Authentication (JWT)
- Search & Filters
- Soft Deletes
- Rate Limiting
- Unit Testing

---

📄 Note

This project is built for assessment purposes to demonstrate backend development skills and understanding of API design.