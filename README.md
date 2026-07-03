Web-Based Auction Administration Management Information System with Document Automation
Overview

This repository contains the source code for the undergraduate thesis project entitled:

Development of a Web-Based Auction Administration Management Information System with Document Automation at the Prosecutor's Office

The application was developed to support the administration of auction activities for confiscated and state-owned assets by automating document generation, managing case and evidence data, and providing document authenticity verification using QR Codes.

Main Features
Case management
Evidence item management
Officer and executor management
Operator management
Automatic document generation from predefined templates
QR Code-based document verification
Digital document management and archiving
Dashboard for monitoring auction administration
Technology Stack
Laravel Framework
PHP
MySQL
Bootstrap
PHPWord
Simple QrCode
JavaScript
HTML & CSS
System Requirements
PHP 8.3 or later
Composer
MySQL / MariaDB
Node.js & npm (optional, for frontend asset compilation)
Web Server (Apache/Nginx)
Installation
1. Clone Repository
git clone https://github.com/YumnaAmalia/lelang-app.git
cd lelang-app
2. Install Dependencies
composer install
3. Copy Environment File
cp .env.example .env

or on Windows:

copy .env.example .env
4. Generate Application Key
php artisan key:generate
5. Configure Database

Update the following variables in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
6. Run Database Migration
php artisan migrate

If seeders are available:

php artisan db:seed
7. Start the Application
php artisan serve

Open:

http://127.0.0.1:8000
Project Structure
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
Application Modules
Dashboard
Case Management
Evidence Item Management
Officer Management
Executor Management
Operator Management
Document Generation
QR Code Verification
Document Archive
Research Purpose

The system was developed to improve the efficiency and accuracy of auction administration processes by:

Reducing manual document preparation.
Automating administrative document generation.
Improving document management.
Providing document authenticity verification through QR Codes.
Supporting digital transformation within the Prosecutor's Office.
Author

Yumna Amalia

Bachelor of Computer Science (PJJ)
BINUS University

License

This repository is intended for academic and research purposes.

All rights reserved © Yumna Amalia.
