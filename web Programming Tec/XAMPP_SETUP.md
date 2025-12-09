# XAMPP & Database Setup Guide

This guide explains how to set up the Street Bull project with XAMPP to run the PHP backend and MySQL database.

## 1. Install XAMPP
1. Download XAMPP for Windows from [apachefriends.org](https://www.apachefriends.org/index.html).
2. Install it (default location `C:\xampp` is recommended).
3. Open the **XAMPP Control Panel**.

## 2. Start Services
1. In the XAMPP Control Panel, find **Apache** and **MySQL**.
2. Click **Start** for both.
3. Ensure they turn green (running).

## 3. Configure the Project
1. Move or copy your project folder `web Programming Tec` to the XAMPP `htdocs` directory.
   - Path: `C:\xampp\htdocs\web Programming Tec`
   - *Note: If you want to keep it in Documents, you'll need to configure a Virtual Host, but moving it is easier.*

## 4. Setup the Database
1. Open your browser and go to `http://localhost/phpmyadmin`.
2. Click **New** in the sidebar to create a database.
3. Name it `streetbull` and click **Create**.
4. Click on the `streetbull` database to select it.
5. Go to the **Import** tab.
6. Click **Choose File** and select `sql/schema.sql` from your project folder.
7. Click **Import** (or Go) at the bottom.
8. Repeat the import process for `sql/seed_players.sql` to add sample players.

## 5. Verify Configuration
1. Open `php/config.php` in your code editor.
2. Ensure the settings match your XAMPP defaults:
   ```php
   define('DB_HOST', '127.0.0.1');
   define('DB_NAME', 'streetbull');
   define('DB_USER', 'root');
   define('DB_PASS', ''); // Default XAMPP password is empty
   ```

## 6. Run the Project
1. Open your browser.
2. Go to `http://localhost/web%20Programming%20Tec/index.html`.
3. Navigate to the **Players** page. You should see the list of players loaded from the database!

## Troubleshooting
- **Database Connection Failed**: Check `php/config.php` credentials.
- **404 Not Found**: Ensure the folder name in `htdocs` matches the URL path.
- **CORS Errors**: If opening the HTML file directly (file://), PHP won't work. You MUST access it via `http://localhost/...`.
