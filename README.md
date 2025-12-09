# Street Bull — Football Agent Sierra Leone

This repository is a minimal scaffold for the project described in `project-Req.md`. It uses plain HTML/CSS/JavaScript for the frontend and PHP + MySQL for the backend.

Getting started (Windows, using XAMPP):

1. Install XAMPP from https://www.apachefriends.org/
2. Start Apache and MySQL from the XAMPP control panel.
3. Copy this folder into your XAMPP `htdocs` directory, for example `C:\xampp\htdocs\streetbull`.
4. Import the SQL schema: open `http://localhost/phpmyadmin`, create the database (or import `sql/schema.sql`).
5. Edit `php/config.php` to match your DB credentials (default is `root` with empty password for XAMPP).
6. Visit the site at `http://localhost/streetbull/index.html`.

Files added:
- `index.html` — basic homepage
- `css/styles.css` — design tokens and basic layout
- `js/main.js` — small frontend helper
- `php/` — PHP endpoints: `config.php`, `db.php`, `auth.php`, `players.php`, `assignments.php`
- `sql/schema.sql` — MySQL schema and seed

Next steps (suggested):
- Build UI pages (players list, player profile, dashboards)
- Add file upload handling (images/video) and storage
- Harden auth (email verification, password reset)
- Add role-based UI controls and server-side authorization checks

If you want, I can now:
- Implement a `players.html` UI that talks to `php/players.php` (CRUD)
- Implement registration/login pages and wire them to `php/auth.php`# Web-Programming-Tec
