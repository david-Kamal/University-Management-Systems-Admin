# University Management System – Admin App & Backend

This repository contains both the native Android admin app and the PHP backend for the University Management System. The platform empowers university admins to efficiently manage all academic operations and student data.

## Features

### **Admin App (Android/Java)**
- **Student Registration:** Add new students and manage their information.
- **Time Table Management:** Create and edit class schedules.
- **Exams Management:** Schedule exams and manage exam data.
- **Attendance Tracking:** Record and review attendance data.
- **Doctor & Subject Management:** Add/assign subjects and doctors.
- **Results Processing:** Enter and review student results.
- **Admin Management:** Add additional admin accounts.

### **Backend (PHP/XAMPP)**
- **RESTful APIs:** For all admin operations (student, doctor, subject, exam, attendance, and results management).
- **Secure Database Access:** Uses PDO and prepared statements to prevent SQL injection.
- **JSON Responses:** For seamless mobile-backend communication.

## Tech Stack

- **Android/Java:** Admin mobile application
- **PHP (XAMPP):** Backend API
- **MySQL:** Database

## Getting Started

### **Admin App**
1. Clone the repo:
   ```
   git clone https://github.com/david-Kamal/University-Management-Systems-Admin.git
   ```
2. Open `app/` in Android Studio.
3. Configure backend API URLs in the app as needed.
4. Build and run on an emulator or device.

### **Backend**
1. Deploy PHP files (`XAMPP Files/gradproj/api/`) to your XAMPP server.
2. Set up the MySQL database using provided scripts.
3. Adjust database credentials as needed in the config files.

## Folder Structure

- `app/src/main/java/com/reham/modernacademystudentaffair/` – Android admin app code
- `XAMPP Files/gradproj/api/` – PHP API endpoints
- `XAMPP Files/gradproj/objects/` – PHP classes

## Feedback

- Good separation of concerns between mobile and backend code.
- Prepared statement usage in PHP is a strong security practice.
- Recommend adding API documentation (e.g., Swagger or Postman collection).
- Consider using Android architecture components (ViewModel, LiveData) for better scalability in the app.

---

## License

[MIT](LICENSE)
