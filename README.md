# Laravel Best Practices Rules
Custom rules and guidelines for Laravel projects.

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
