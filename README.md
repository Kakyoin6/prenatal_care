# MamaCare - Online Prenatal Care Management System

## 📌 Overview

**MamaCare** is an Online Prenatal Care Management System designed to provide a centralized platform for pregnant women, doctors, and administrators to manage and access prenatal healthcare services. It streamlines registration, appointment scheduling, medical record management, and health education for improved maternal and child health outcomes.

## 👥 User Roles

- **Admin**: Manages users, appointments, and system settings.
- **Doctor**: Views and manages patient records, schedules, and provides care recommendations.
- **Patient**: Registers, schedules appointments, and accesses health information.

## 🛠️ Features

- 📝 **User Registration & Login**
  - Secure sign-up with CSRF protection
  - Role-based authentication (Admin, Doctor, Patient)

- 📅 **Appointment Scheduling**
  - Patients can book appointments
  - Doctors manage and confirm schedules

- 📂 **Medical Records**
  - Health history tracking
  - Doctor notes and reports

- 🧑‍⚕️ **Doctor-Patient Interaction**
  - Messaging or consultation module (optional)

- 📚 **Health Education**
  - Articles, prenatal tips, and alerts

- 🧾 **Admin Dashboard**
  - User management
  - Reports and analytics
  - Tailwind CSS-styled interface

## 🚀 Technologies Used

- **Backend**: PHP (Vanilla PHP or Laravel optionally)
- **Frontend**: HTML, Tailwind CSS, JavaScript
- **Database**: MySQL
- **Security**: CSRF Tokens, Session-based Auth
- **Hosting**: Compatible with shared or cloud-based servers

## 🧑‍💻 Installation & Setup

### 1. **Clone the repository**

```bash
git clone https://github.com/Kakyoin6/prenatal_care.git
cd prenatal_care
```

### 2. **Setup Database**

- Create a MySQL database named `prenatal_care`
- Import the database schema (if available in the repository)
- Update database credentials in `config.php.example` and rename to `config.php`

### 3. **Configure the Application**

- Copy `config.php.example` to `config.php`
- Update database credentials (host, username, password, database name)
- Ensure the database server is running

### 4. **Run the Application**

- Upload files to your web server or local development environment
- Ensure you have PHP 7.4+ installed
- Navigate to `http://localhost/prenatal_care` (or your configured URL)

### 5. **Default Login Credentials**

- **Admin Username**: admin
- **Admin Password**: admin123
- **Change credentials after first login for security**

## 📚 Project Structure

```
prenatal_care/
├── index.php              # Main landing page
├── login.php              # Login page
├── register.php           # User registration
├── dashboard.php          # User dashboard
├── admin_panel.php        # Admin dashboard
├── config.php             # Database configuration
├── db.php                 # Database connection
├── dashboard.css          # Styling
└── [Other feature files]  # Appointment, records, profile management
```

## 🔒 Security Considerations

- ✅ CSRF protection implemented
- ✅ Session-based authentication
- ⚠️ Always use strong passwords in production
- ⚠️ Never commit sensitive credentials to version control
- ⚠️ Use HTTPS in production environments
- ⚠️ Implement input validation and sanitization

## 🤝 Contributing

Contributions are welcome! Please follow these steps:
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 📧 Contact & Support

For issues or questions, please open an issue on GitHub or contact the project maintainer.

## 🙏 Acknowledgments

- Built with PHP and MySQL
- UI Components styled with Tailwind CSS
- Dedicated to improving maternal and child health outcomes