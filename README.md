🎅 Secret Santa Assignment System

📌 Project Overview

The Secret Santa Assignment System is a Laravel-based application designed to automate the process of assigning Secret Santa participants within a company. The system ensures:

No employee is assigned to themselves.

Employees are not assigned the same Secret Child as in the previous year.

Every employee has exactly one Secret Child and vice versa.

🛠️ Tech Stack

Framework: Laravel 

Database: MySQL

Frontend: Blade Templates 

File Handling: Laravel Excel (for CSV import/export)

Version Control: GitHub/GitLab

🚀 Installation Guide

1️⃣ Prerequisites

Ensure you have the following installed:

PHP 8.1+

Composer

MySQL

Node.js & NPM

Laravel 10

Git

2️⃣ Clone the Repository

 git clone https://github.com/nandhinimurugan310/secret-santa_new
 cd secret-santa_new

3️⃣ Install Dependencies

composer install
npm install
npm run dev

4️⃣ Configure Environment Variables

Create a .env file from .env.example and update database credentials:

cp .env.example .env
php artisan key:generate

Set up database connection in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secret_santa
DB_USERNAME=root
DB_PASSWORD=

5️⃣ Run Migrations

php artisan migrate

6️⃣ Seed Sample Data (Optional)

php artisan db:seed

7️⃣ Run the Laravel Server

php artisan serve

Your application should now be running at http://127.0.0.1:8000 🎉
🔄 mysql db
uploaded sql file for uploading

🔄 How to Use

1️⃣ Upload Employee List (CSV Format)

Navigate to http://127.0.0.1:8000/employees

Upload a CSV file with columns:

Employee_Name, Employee_EmailID

2️⃣ Import previous year Secret Santa Assignments

http://127.0.0.1:8000/previous-assignments

3️⃣ Export and Assignments

Navigate to http://127.0.0.1:8000/assignments

Download the CSV file containing:

Employee_Name, Employee_EmailID, Secret_Child_Name, Secret_Child_EmailID

🧪 Running Tests

To ensure reliability, run the following tests:

php artisan test

🔥 Error Handling

Handles invalid CSV files.

Avoids infinite loops in assignments.

Displays user-friendly error messages.

📌 Deployment

For production deployment:

php artisan config:cache
php artisan route:cache
php artisan optimize

Use a web server like Apache or Nginx with a Laravel queue for performance.

📜 License

This project is open-source under the MIT License.

💡 Author

Your Name📧 Email:nandhinimurugan310@gmail.com

Happy Coding! 🎁