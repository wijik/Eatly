# Eatly – Healthy Food Recommendation Web App

Eatly is a web-based healthy food recommendation system built using Laravel.  
This application helps users find daily meal recommendations based on their calorie needs and preferences.

## 🚀 Features
- User authentication (Login & Register)
- Daily food menu management
- Healthy food recommendation system
- CRUD Menu (Admin)
- Role-based access control
- Modal-based detail view
- Profile image upload

## 🧠 Recommendation Logic
The system uses a simplified calorie calculation:
Calorie Needs = Body Weight (kg) × 30

The result is used as an initial filter before applying further recommendation logic.

## 🛠 Tech Stack
- Laravel
- PHP
- MySQL
- Bootstrap
- JavaScript
- Glassmorphism UI Design

## 🧪 Testing
End-to-end and automation testing implemented separately using Playwright:
👉 See: eatly-qa-automation repository

## ⚙️ Installation
1. Clone the repository
2. Run `composer install`
3. Setup `.env`
4. Run `php artisan migrate`
5. Run `php artisan serve`
   
## 🗄️ Database Setup
To create tables and generate the default admin account, run:
php artisan migrate:fresh --seed
This command will:
1. Drop all existing tables (if any)
2. Recreate the database structure
3. Automatically create the default admin account
   
⚠️ Use migrate:fresh for development only.

For production environment, use:
php artisan migrate

## 👤 Default Admin Account
After running the seeder, you can login using:
Email    : admin@eatly.com
Password : admin123

## 🧪 Testing
End-to-end and automation testing implemented separately using Playwright:
👉 See: eatly-qa-automation repository

## 👨‍💻 Author
Developed as part of a final project and extended as a portfolio system.
