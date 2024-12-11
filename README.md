# Laravel User Role Management System

This project is a Laravel-based User Role Management System that includes features for role-based access control, user management, and authentication.

## Features

- **Admin Panel**:
  - View all users.
  - Assign roles to users (`admin`, `subadmin`, `normal`).
  - Delete users (`subadmin` and `normal` roles only, excluding self).

- **SubAdmin Panel**:
  - View all `subadmin` and `normal` users.
  - Assign roles to `normal` users.
  - Delete `normal` users only, excluding self.

- **User Authentication**:
  - Login and registration system with role assignment (`normal` by default).
  - Session-based authentication with role-specific redirection.

- **Middleware**:
  - Role-based access control using a custom `CheckRole` middleware.

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- Laravel 10.x
- MySQL or any other database supported by Laravel

### Steps to Install

1. Clone the repository:
   ```bash
   git clone https://github.com/frozenstar0301/laravel-edge-test.git
   cd laravel-edge-test
   ```
2. Install dependencies:
    ```bash
    composer install
    ```
3. Set up environment variables:
    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database and mail configurations.

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```
5. Run migrations and seeders:
    ```bash
    php artisan migrate --seed
    php artisan db:seed --class=AdminSeeder
    ```
6. Start the development server:
    ```bash
    php artisan serve
    ```

The application will be accessible at `http://localhost:8000`.

## Usage

### Default Admin Credentials
After running the seeders, a default admin user will be created:

- Email: `admin@admin.com`
- Password: `admin`

### Routes
- Auth Routes:
    - Login: `/login`
    - Register: `/register`
- Admin Panel: `/admin/dashboard`
- SubAdmin Panel: `/subadmin/dashboard`
- User Panel: `/user/dashboard`

## Project Structure

- Controllers:
    - `AdminController`: Handles admin-specific operations.
    - `SubAdminController`: Manages subadmin-specific tasks.
    - `AuthController`: Handles user authentication and registration.
- Middleware:
    - `CheckRole`: Ensures role-based access control.
- Models:
    - `User`: The user model with role management.
- Database:
    - Migrations: Defines the `users` table schema.
    - Seeders: Creates a default admin user.