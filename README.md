# 🏥 Hospital Management System — Laravel

A complete **Hospital Management & Appointment Booking System** built with **Laravel**, designed to manage patients, doctors, appointments, real-time communication, notifications, and hospital administration through dedicated dashboards.

---

## 🔍 Overview

The system provides a complete digital experience for **visitors, patients, doctors, and administrators**.

Patients can browse doctors and specialties, book and manage appointments, receive notifications, communicate with doctors through a **real-time chat system**, and manage their personal profiles.

Doctors have a dedicated dashboard to manage appointments, monitor patients, communicate with them in real time, and view appointment statistics.

Administrators have full control over the hospital system through a comprehensive dashboard with statistics, charts, and management tools.

---

# 👥 User Roles & Permissions

## 🔹 Visitor

Visitors can:

* Browse the hospital website
* View available doctors
* View medical specialties
* View doctor profiles
* View doctor contact information
* Browse the website without authentication
* Register or login to access appointment features

> 🔒 Visitors must be authenticated before booking an appointment.

---

## 🔹 Patient

Patients can:

### 🔐 Authentication

* Register and login
* Login using Google
* Login using Facebook
* Manage their personal profile
* Update personal information

### 📅 Appointment Management

* Browse doctors and specialties
* View available appointment slots
* Book appointments
* Prevent double booking of the same time slot
* View all personal appointments
* Edit/reschedule appointments
* Cancel appointments
* Track appointment status

### 🔔 Notifications

Patients receive notifications when:

* A new appointment is created
* The doctor changes the appointment status
* Other appointment-related actions occur

### 💬 Real-Time Chat

Patients can communicate directly with their doctors using a **real-time messaging system**.

* Send messages to doctors
* Receive messages instantly
* Real-time communication using Laravel Reverb
* Easy communication between patients and doctors

---

# 👨‍⚕️ Doctor Dashboard

The doctor dashboard was completely redesigned to provide a more powerful and user-friendly experience.

## 📊 Appointment Statistics

Doctors can monitor their appointments through statistics including:

* Total appointments
* Pending appointments
* Accepted appointments
* Rejected appointments
* Completed appointments
* Cancelled appointments

This allows doctors to quickly understand their appointment activity.

---

## 📅 Appointment Management

Doctors can:

* View all assigned appointments
* View appointment details
* Accept appointments
* Reject appointments
* Change appointment status
* Track completed appointments
* Manage their available appointments

---

## 👥 Patient Management

Doctors have a dedicated **Patients** section.

For each patient, the doctor can view:

* Patient profile
* Patient information
* Appointment history
* Previous appointments
* Patient progress and follow-up information
* Related medical/appointment activity

This makes it easier for doctors to follow up with their patients and monitor their progress over time.

---

## 💬 Doctor–Patient Real-Time Chat

Doctors can communicate directly with patients through the integrated real-time chat system.

Features include:

* Send and receive messages instantly
* Real-time messaging
* Patient conversations
* Easy communication between doctors and patients
* Built using **Laravel Reverb**

---

## 🔔 New Appointment Notifications

Doctors receive a notification whenever a new appointment is booked with them.

This allows doctors to immediately know when a new patient has scheduled an appointment.

---

## 👤 Doctor Profile

Doctors can manage their personal profile and update their information.

---

# 🛠 Admin Dashboard

The system includes a complete administration panel for managing the hospital platform.

## 📊 Dashboard Analytics

The admin dashboard provides:

* Total users
* Total doctors
* Total patients
* Total specialties
* Appointment statistics
* Daily appointments
* Latest appointments
* Appointment charts
* System overview and analytics

---

## 👥 User Management

Administrators can:

* View users
* View user information
* Manage users
* Activate users
* Deactivate users
* Manage patient accounts

---

## 👨‍⚕️ Doctor Management

Administrators can:

* Add doctors
* Edit doctors
* Delete doctors
* Manage doctor information
* Assign specialties
* Manage doctor accounts

---

## 🏥 Specialty Management

Administrators can:

* Add specialties
* Edit specialties
* Delete specialties
* Manage available medical specialties

---

## 📅 Appointment Management

Administrators can:

* View all appointments
* Monitor appointment status
* Manage appointments
* Track appointment activity

---

# 🔔 Notification System

The application includes an integrated notification system for important appointment events.

Notifications help keep both doctors and patients updated about appointment activity and status changes.

---

# 💬 Real-Time Chat

The system includes a real-time chat feature between doctors and patients.

### Technologies used:

* Laravel Reverb
* Laravel Broadcasting
* Laravel Echo
* WebSockets

Messages are delivered in **real time**, providing fast and convenient communication between doctors and patients without manually refreshing the page.

---

# 🔐 Authentication

The system supports multiple authentication methods:

* Traditional Email & Password Authentication
* Google Login
* Facebook Login

This provides users with a faster and more convenient registration and login experience.

---

# 📱 User Experience

The project includes continuous **UI/UX improvements** focused on making the platform easier to use for all types of users.

The interface provides:

* Responsive layouts
* Clear navigation
* Dedicated dashboards
* User-friendly appointment management
* Organized patient information
* Easy communication between doctors and patients
* Improved dashboard experience

---

# 🛠 Tech Stack

### Backend

* PHP
* Laravel

### Frontend

* Blade
* HTML
* CSS
* JavaScript
* Bootstrap

### Database

* MySQL

### Admin Panel

* AdminLTE

### Charts & Analytics

* Chart.js

### Real-Time Communication

* Laravel Reverb
* Laravel Echo
* WebSockets

### Authentication

* Laravel Authentication
* Google OAuth
* Facebook OAuth

### Development Tools

* Composer
* NPM
* Vite
* Git
* GitHub

---

# ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/yasersamy-dev/Hospital-Management-System-Laravel.git
```

### 2. Enter the project directory

```bash
cd Hospital-Management-System-Laravel
```

### 3. Install PHP dependencies

```bash
composer install
```

### 4. Install frontend dependencies

```bash
npm install
```

### 5. Create environment file

```bash
cp .env.example .env
```

On Windows, you can simply copy `.env.example` and rename it to:

```text
.env
```

### 6. Generate application key

```bash
php artisan key:generate
```

### 7. Configure the database

Update your `.env` file:

```env


### 8. Run migrations

```bash
php artisan migrate
```

### 9. Build frontend assets

```bash
npm run build
```

### 10. Start Laravel

```bash
php artisan serve
```

---

# ⚡ Running Real-Time Chat

The project uses **Laravel Reverb** for real-time communication.

Start the Reverb server:

```bash
php artisan reverb:start
```

For development, you can also run Vite:

```bash
npm run dev
```

Then access the application through:

```text
http://127.0.0.1:8000
```

---

# 📌 Main Features Summary

| Feature                       | Status |
| ----------------------------- | ------ |
| User Registration & Login     | ✅      |
| Google Login                  | ✅      |
| Facebook Login                | ✅      |
| Doctor Management             | ✅      |
| Patient Management            | ✅      |
| Specialty Management          | ✅      |
| Appointment Booking           | ✅      |
| Appointment Rescheduling      | ✅      |
| Appointment Cancellation      | ✅      |
| Appointment Status Management | ✅      |
| Double Booking Prevention     | ✅      |
| Patient Notifications         | ✅      |
| Doctor Notifications          | ✅      |
| Real-Time Chat                | ✅      |
| Laravel Reverb                | ✅      |
| Doctor Dashboard              | ✅      |
| Patient Profiles              | ✅      |
| Patient Appointment History   | ✅      |
| Doctor Appointment Statistics | ✅      |
| Admin Dashboard               | ✅      |
| Admin Statistics & Charts     | ✅      |
| Responsive UI/UX              | ✅      |

---

# 🎯 Project Goals

The main goal of this project is to provide a complete hospital management solution that simplifies:

* Appointment booking
* Doctor–patient communication
* Patient follow-up
* Appointment management
* Hospital administration
* Notifications and real-time communication

The project also demonstrates practical implementation of **Laravel authentication, authorization, database relationships, notifications, real-time broadcasting, dashboards, CRUD operations, and third-party authentication integrations**.

---

# 👨‍💻 Developer

**Yaser Samy**

Laravel Backend Developer

GitHub:
https://github.com/yasersamy-dev

```

---

## 🚀 Future Improvements

Potential future improvements include:

- Online payment integration
- Video consultations
- Prescription management
- Medical records
- Doctor availability scheduling
- Advanced reporting
- Email/SMS notifications
- Advanced patient medical history
- Mobile application integration
```




