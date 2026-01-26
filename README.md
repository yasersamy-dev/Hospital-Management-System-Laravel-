README
# Hospital Management System (Laravel)

A complete hospital appointment management system built with Laravel.

## 🔍 Overview
This system allows visitors, patients, doctors, and admins to interact with the hospital platform based on their roles.

## 👥 User Roles & Permissions

### 🔹 Visitor
- Browse the entire website
- View doctors and specializations
- Cannot book appointments without login

### 🔹 Patient (User)
- Register & login
- Book appointments
- Cannot book an already reserved time slot
- Edit personal profile
- Cancel or reschedule appointments
- Each appointment time slot can be booked by only one patient

### 🔹 Doctor
- Login to a dedicated dashboard
- View assigned appointments
- Change appointment status:
  - Accepted
  - Rejected
  - Pending

### 🔹 Admin
- Full control panel with statistics and charts
- Manage:
  - Users
  - Doctors
  - Specializations
  - Appointments
- Activate / deactivate users
- View system analytics and latest appointments

## 📊 Admin Dashboard Features
- Total users, doctors, patients, specializations
- Daily appointments count
- Latest appointments list
- Appointments chart (last 7 days)

## 🛠 Tech Stack
- Laravel
- PHP
- MySQL
- Blade
- AdminLTE
- Chart.js

## ⚙️ Installation
```bash
git clone https://github.com/yasersamy-dev/Hospital-Management-System-Laravel
cd REPOSITORY
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

