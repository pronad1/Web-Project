
# 🧑‍💼 Job Portal Web Application

A complete **Job Portal Web Application** built from scratch using **HTML5, CSS3, Core PHP (Procedural)**, and **MySQL**.

This system is designed to streamline the job application and hiring process for **Admins**, **Employers**, and **Job Seekers**, with a secure role-based login system and dynamic dashboards for each user type.

---

## 🔗 Live Demo

👉 [View Live Application](https://saikat1156.liveblog365.com/index.php)

---

## 📁 Project Features

### 🔐 Role-Based Login System
- Admin, Employer, and Job Seeker dashboards
- Secure session-based login with separate tables

### 🧑‍💼 Employer Dashboard
- Post, update, and delete job listings
- View and manage applicants with CV download

### 🔍 Job Seeker Dashboard
- Search and apply to jobs
- Upload resume and view application history

### 🛠 Admin Panel
- Manage users, job categories, job posts, and application status
- Approve or decline employer job postings

### 📄 Application Management
- Resume uploads
- Real-time application tracking

---

## 🧰 Tech Stack

- **Frontend**: HTML5, CSS3
- **Backend**: PHP (Core, Procedural)
- **Database**: MySQL
- **Tools**: VS Code, XAMPP, phpMyAdmin

---

## 🚀 How to Run This Project Locally

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/pronad1/Web-Project.git
```
Or download the ZIP file and extract it.
### 2️⃣ Move the Project to Your Local Server
```
C:/xampp/htdocs/Web-Project
```
### 3️⃣ Import the Database
Open phpMyAdmin via your browser:
http://localhost/phpmyadmin

Create a new database (e.g., jobportal).

Click Import, then upload the included SQL file:
```
Web-Project/database/jobportal.sql
```
### 4️⃣ Configure Database Connection
Open db_connect.php (or the equivalent connection file).

Update the following variables if needed:
```
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'jobportal'; // Your created DB name
```
### 5️⃣ Run the Project
Visit the app in your browser:
```
5️⃣ Run the Project
Visit the app in your browser:
```

### 📂 Folder Structure Overview
```
Web-Project/
│
├── admin/              # Admin dashboard
├── employer/           # Employer dashboard
├── jobseeker/          # Job seeker dashboard
├── database/           # SQL file
├── css/                # Stylesheets
├── js/                 # JavaScript (optional)
├── db_connect.php      # Database connection file
└── index.php           # Homepage
```
### 💬 Feedback & Contributions
If you find any bugs or have feature suggestions, feel free to open an issue or submit a pull request.

### 🙋‍♂️ Developed By
Prosenjit Mondol
🌐 Live Demo
📂 GitHub Repo

### 📜 License
This project is open source and available under the MIT License.
```

Let me know if you'd like to convert this into a `README.md` file directly or want a Bengali version too for local portfolios.
```
