# DistrictOmni SIS

A modern, module-based SIS (Student Information System) built with **PHP 8.2**, **FastRoute**, and **Eloquent ORM**.

## Prerequisites

1. **PHP >= 8.2**  
2. **MySQL/MariaDB** (or a compatible database)  
3. **Composer** for dependency management  
4. **Apache** (with `mod_rewrite` enabled) or another server capable of serving PHP  
5. **Git** (to clone the repository, if desired)

## Installation & Setup

### 1. Clone the Repository

    git clone https://github.com/yourorg/districtomni-sandbox.git
    cd districtomni-sandbox

*(Replace the URL with your actual repo.)*

### 2. Install Dependencies

    composer install

Composer fetches and installs all required libraries, including:
- **vlucas/phpdotenv** for environment variables  
- **monolog/monolog** for logging  
- **illuminate/database** for Eloquent ORM  
- **nikic/fast-route** for routing

### 3. Create & Configure `.env`

1. Create a file named `.env` in the project root (same folder as `composer.json`).  
2. Add content similar to:

        APP_TIMEZONE=UTC
        APP_DEBUG=1
        
        DB_DRIVER=mysql
        DB_HOST=127.0.0.1
        DB_DATABASE=district_omni
        DB_USERNAME=root
        DB_PASSWORD=
        
   Adjust for your local setup.  
3. This file is **ignored** by Git (see `.gitignore`). Keep credentials out of version control.

### 4. Database Setup

- Create a MySQL/MariaDB database named `district_omni` (or whatever name is in `.env`).  
- Adjust the DB credentials in `.env` if needed.  
- If you have migrations or setup scripts, run them here.

### 5. Configure Apache

1. **Enable mod_rewrite**: In `httpd.conf` or `httpd-xampp.conf`, ensure:
    
        LoadModule rewrite_module modules/mod_rewrite.so
    
2. **AllowOverride**: In your `<Directory>` block for `htdocs`, set `AllowOverride All`.  
3. In `public/.htaccess`, add a rewrite snippet:
    
        <IfModule mod_rewrite.c>
          RewriteEngine On
          RewriteBase /districtomni-sandbox/public/
          RewriteCond %{REQUEST_FILENAME} !-f
          RewriteCond %{REQUEST_FILENAME} !-d
          RewriteRule ^ index.php [QSA,L]
        </IfModule>
        
   Adjust the `RewriteBase` if necessary.  

### 6. Serve the Application

- Start Apache/MySQL (e.g. via XAMPP).  
- Access your app in the browser. For example:
    
        http://localhost/districtomni-sandbox/public/
    
- Test a route, e.g.:
    
        http://localhost/districtomni-sandbox/public/auth/login
    
  You should see the content defined in `src/Modules/Auth/routes.php`.

### 7. .gitignore

A typical `.gitignore` includes:

    /vendor/
    composer.lock
    
    .env
    .env.*
    
    /storage/logs/*
    !.gitkeep
    
    .idea/
    .vscode/
    .DS_Store
    Thumbs.db

This ensures dependencies, environment files, and local logs are not committed.

### Project Structure

    districtomni-sandbox/
    ├── composer.json
    ├── .env
    ├── public/
    │   └── index.php
    ├── src/
    │   ├── Core/
    │   │   ├── Application.php
    │   │   ├── Bootstrap.php
    │   │   ├── Database.php
    │   │   └── Router.php
    │   └── Modules/
    │       └── Auth/
    │           ├── routes.php
    │           ├── Controllers/
    │           ├── Models/
    │           └── Views/
    └── storage/
        └── logs/
            └── app.log

- **`public/index.php`** is the front controller.  
- **`src/Core/*`** contains core classes (application bootstrap, router, etc.).  
- **`src/Modules`** is organized by module (e.g., `Auth`).  
- **`storage/logs`** is where Monolog writes `app.log`.

### Troubleshooting

- **404 Not Found** usually means `.htaccess` or `RewriteBase` issues.  
- **500 Internal Server Error** can indicate a syntax error in `.htaccess` or `AllowOverride` is not set to `All`.  
- **Class not found** means you may need to run `composer dump-autoload -o` or check your namespaces.

---

**Enjoy building DistrictOmni SIS!**
