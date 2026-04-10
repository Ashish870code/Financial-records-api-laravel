<h1>💰 Financial Records Management API</h1>

📌 Overview

This project is a backend API built using Laravel that manages financial records such as income and expenses. It demonstrates real-world backend development concepts including CRUD operations, filtering, pagination, validation, role-based access control, and summary analytics.

---

🚀 Features

🔹 Financial Records Management

- Create financial records
- View records with pagination
- Update records
- Delete records
- Filter records by:
  - Type (income / expense)
  - Category
  - Date

---

🔹 Dashboard Summary APIs

- Total Income
- Total Expenses
- Net Balance

---

🔹 User & Role Management

- Create and manage users
- Assign roles (Viewer, Analyst, Admin)
- Manage user status (active/inactive)
- Role-based access control:
  - Viewer → Read-only access
  - Analyst → Read + insights access
  - Admin → Full access (create, update, delete)

---

🔹 Access Control

- Implemented role-based restrictions at controller level
- Unauthorized actions return proper error responses

---

🔹 Validation & Error Handling

- Request validation for all inputs
- Meaningful error messages
- Proper HTTP status codes:
  - 200 OK
  - 201 Created
  - 403 Forbidden
  - 404 Not Found

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

🔹 Financial Records

- POST "/api/tasks" → Create record
- GET "/api/tasks" → Get records (with pagination & filters)
- PUT "/api/tasks/{id}" → Update record
- DELETE "/api/tasks/{id}" → Delete record

---

🔹 Filters

- "/api/tasks?type=income"
- "/api/tasks?category=Salary"
- "/api/tasks?date=2026-04-03"

---

🔹 Dashboard

- GET "/api/summary" → Get financial summary

---

🔹 Users

- POST "/api/users" → Create user
- GET "/api/users" → List users
- PUT "/api/users/{id}" → Update user

---

🧪 Example Request

Create Record

POST /api/tasks
Headers:
role: admin

Body:
{
  "title": "Temp",
  "amount": 5000,
  "type": "income",
  "category": "Salary",
  "date": "2026-04-03",
  "description": "Monthly salary"
}

---

🧠 Design Decisions

- Used MVC architecture for clean separation of concerns
- Implemented role-based access at controller level
- Used pagination for efficient data handling
- Applied validation for data integrity
- Used SQLite for simplicity and quick setup

---

✨ Future Enhancements

- Authentication using Laravel Sanctum (token-based)
- Category-wise summary and analytics
- Search functionality
- Soft delete support
- Rate limiting
- Unit and integration testing
- API documentation using Swagger/Postman collections
- Middleware-based role handling

---

📄 Note

This project is built for assessment purposes to demonstrate backend development skills, API design, and logical problem-solving. The focus is on clean architecture, real-world behavior, and scalable design thinking rather than production-level complexity.
