# 🍽️ Eatly – Healthy Food Recommendation Web App

Eatly is a web-based healthy food recommendation system built using Laravel.  
This application helps users find daily meal recommendations based on their calorie needs and preferences.

---

## 📌 Overview

Eatly helps users determine their daily calorie needs and provides menu recommendations accordingly.  
The system also includes role-based access control, allowing admins to manage daily menus.

---

## 🚀 Features

- User authentication (Login & Register)
- Daily food menu management
- Healthy food recommendation system
- CRUD Menu (Admin)
- Role-based access control
- Modal-based detail view
- Profile image upload

---

## 🧠 Recommendation Logic

The system uses a simplified calorie calculation:

```bash
Calorie Needs = Body Weight (kg) × 30
```

The result is used as an initial filter before applying further recommendation logic.

---

## 🛠 Tech Stack

- **Framework**: Laravel  
- **Backend**: PHP  
- **Database**: MySQL  
- **Frontend**: Bootstrap, JavaScript  
- **UI Design**: Glassmorphism  

---

## ⚙️ Installation Guide

### 1️⃣ Clone Repository

```bash
git clone https://github.com/your-username/your-repository.git
cd your-repository
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Setup Environment File

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database connection:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate Application Key

```bash
php artisan key:generate
```

---

## 🗄️ Database Setup

To create tables and generate the default admin account:

```bash
php artisan migrate:fresh --seed
```

This command will:

- Drop all existing tables (if any)
- Recreate the database structure
- Automatically create the default admin account

> ⚠️ Use `migrate:fresh` for development only.

For production environment, use:

```bash
php artisan migrate
```

---

## 👤 Default Admin Account

After running the seeder, you can login using:

```bash
Email    : admin@eatly.com
Password : admin123
Role     : Admin (role = 0)
```

> 🔐 It is strongly recommended to change the password after first login.

---

## 🧪 Testing

End-to-end and automation testing are implemented separately using Playwright.

👉 See: **eatly-qa-automation repository**

---

## 📂 Project Structure (Simplified)

```
app/
database/
resources/
routes/
public/
```

---

## 👨‍💻 Author

Developed as part of a final project and extended as a portfolio system.
