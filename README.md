# Task Management Application

A robust Task Management Web Application built with **Laravel 11**, designed to manage tasks, categories, and tags securely per user.

---

## 🚀 Features

- **Authentication & Security:** Built using Laravel authentication. User data is fully isolated.
- **Task Management (CRUD):** Complete system to Create, Read, Update, and Delete tasks.
- **Dynamic Relations:** 
  - Each Task belongs to a **Category** (Owned by the user).
  - Each Task can have multiple **Tags** (Many-to-Many relationship).
- **Security & Authorization:**
  - Form Requests with custom validation rules (e.g., ensuring selected Category belongs to the authenticated user).
  - Policies (`TaskPolicy`) to restrict users from accessing or modifying other users' tasks.
- **Upcoming Tasks Alert (Special Feature):** Filter and display pending tasks due within the next 24 hours.

---

## 🛠️ Requirements & Tech Stack

- **Framework:** Laravel 11.x
- **Language:** PHP 8.2+
- **Database:** MySQL / SQLite
- **Environment:** Laragon / Local Server

---

## 📦 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone <YOUR_REPOSITORY_URL>
   cd new-task

## 📌 API Endpoints Table

| العملية | الـ HTTP Method | الـ Endpoint | Auth | Response |
| :--- | :---: | :--- | :---: | :---: |
| عمل حساب | `POST` | `/api/register` | لا يحتاج | `201 Created` |
| تسجيل دخول | `POST` | `/api/login` | لا يحتاج | `200 OK` |
| تسجيل الخروج | `POST` | `/api/logout` | Bearer Token | `200 OK` |
| عرض بياناتي | `GET` | `/api/me` | Bearer Token | `200 OK` |
| عمل كاتيجوري | `POST` | `/api/categories` | Bearer Token | `200 OK` |
| عرض الكاتيجوري | `GET` | `/api/categories` | Bearer Token | `200 OK` |
| عرض كاتيجوري محدد | `GET` | `/api/categories/{id}` | Bearer Token | `200 OK` |
| تعديل كاتيجوري | `PUT / PATCH` | `/api/categories/{id}` | Bearer Token | `200 OK` |
| حذف كاتيجوري | `DELETE` | `/api/categories/{id}` | Bearer Token | `200 OK / 204` |
| عمل تاسك | `POST` | `/api/tasks` | Bearer Token | `200 OK` |
| عرض تاسكاتي | `GET` | `/api/tasks` | Bearer Token | `200 OK` |
| عرض تاسك محدد | `GET` | `/api/tasks/{id}` | Bearer Token | `200 OK` |
| تعديل تاسكات | `PUT / PATCH` | `/api/tasks/{id}` | Bearer Token | `200 OK` |
| حذف تاسك | `DELETE` | `/api/tasks/{id}` | Bearer Token | `200 OK / 204` |
.

