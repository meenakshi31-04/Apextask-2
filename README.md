# PHP Blog CRUD Application with Authentication

## 📌 Project Overview
This is a simple PHP web application that allows users to:
- **Register & Login** (User Authentication)
- **Create, Read, Update, Delete (CRUD)** blog posts
- **Manage sessions securely** with password hashing

Built using **PHP**, **MySQL**, and **PDO**.

---

## ⚙️ Setup Instructions

### 1. Install Local Server
- Download and install [XAMPP](https://www.apachefriends.org/) or WAMP.
- Start **Apache** and **MySQL** services.

### 2. Database Setup
- Open [phpMyAdmin](http://localhost/phpmyadmin).
- Run this SQL:
```sql
CREATE DATABASE blog;

USE blog;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3. Configure Project

Place the project folder inside:
htdocs/blog/ (for XAMPP)

Edit config.php if needed (DB username & password).

4. Run Application

Go to http://localhost/blog/register.php

🗂️ Project Structure

blog/
│── config.php        # Database connection
│── register.php      # User registration
│── login.php         # User login
│── logout.php        # User logout
│── index.php         # Show all posts
│── create.php        # Create new post
│── edit.php          # Edit post
│── delete.php        # Delete post
│── README.md         # Documentation

✨ Features

User Authentication (Register/Login/Logout)

Password hashing with password_hash() & password_verify()

CRUD operations for blog posts

Session management

Simple & easy-to-understand PHP code

