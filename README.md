# Task Manager

A simple task management web application built with Laravel. Users can create and manage tasks, organize them by category, and admins can manage users and assign tasks members.

This project is a Laravel version of an earlier task manager built with plain PHP, with improvements to structure and validation.

## Features

- **Authentication** — register, login, logout with sessions
- **Tasks** — create, edit, soft delete, restore, view deleted tasks
- **Task assignment** — admins can assign tasks to one or more users
- **Categories** — admins can manage categories
- **Profile** — users can update their own username and email
- **Access control** — every action is authorized server-side using Laravel Policies

### Roles & Access

There are two roles, `member` and `admin`:

- **Member**
  - Can view, edit, and delete only the tasks assigned to them
  - When a member creates a task, they are automatically assigned to it
  - Can restore their own deleted tasks
  - Can update their own profile (username, email)
  - Cannot access user management, category management, or task assignment
- **Admin**
  - Can do everything a member can, on any task (not just their own)
  - Can create, edit, and delete users
  - Can create, edit, and delete categories
  - Can assign a task to one or more users
  - Can view and restore any deleted task

## Project Structure

```
app/
├── Enums/            # Priority, Status, Role
├── Http/
│   ├── Controllers/  # One controller per resource
│   └── Requests/     # Form Request validation classes
├── Models/           # User, Task, Category
├── Policies/         # Authorization rules per model
resources/
└── views/
    ├── layouts/       # Shared master layout
    ├── components/    # Reusable partials (nav)
    ├── auth/
    ├── tasks/
    ├── categories/
    └── users/
database/
└── migrations/
```

## Setup

1. Clone the repository and install dependencies:
   ```
   composer install
   ```
2. Configure your database in `.env`, then run migrations:
   ```
   php artisan migrate
   ```
3. Serve the app:
   ```
   php artisan serve
   ```
   Then visit `http://127.0.0.1:8000` in your browser.

The first user must be created via `register`, then manually promoted to `admin` (e.g. via `tinker` or directly in the database), since there is no public admin signup.

## Notes

-Creating first admin: Register a normal account through the UI, then promote it to admin manually — either through tinker or by editing that user's role column directly in the database.
- Deleting a task is a soft delete; deleted tasks can be viewed and restored separately.
- Deleting a category does not delete its tasks — the task's category is cleared.
