# Newsletter Management System (Laravel)

## Project Overview

This project is a web-based Newsletter Management System developed using **Laravel**.
It allows administrators to create, manage, and control news content with an automatic expiry feature, while users can view only active news updates.

Expired content is soft-deleted (not permanently removed) and can be restored by the admin, making the system suitable for short-lived announcements such as alerts, maintenance notices, and temporary updates.

---

## Key Features

### Admin Features

* Admin authentication (login)
* Create, view, edit, and delete newsletters
* Automatic content expiry after 2 minutes
* Soft delete (no permanent deletion)
* Restore expired content and extend expiry for another 2 minutes
* View both active and deleted newsletters

### User Features

* View only active newsletters
* Clean and responsive news display
* Auto-refresh news content every 30 seconds

---

## Auto Expiry Logic

* When a newsletter is created, it is given an expiry time of 2 minutes
* After expiry:
  * The content is automatically soft-deleted using Laravel Scheduler
  * The content is hidden from users
* Admin can restore expired content, which:
  * Removes soft-delete status
  * Resets expiry time for another 2 minutes
    
---

## Tech Stack

* **Backend:** Laravel
* **Frontend:** Blade Templates, Tailwind CSS
* **Database:** MySQL
* **Scheduler:** Laravel Task Scheduler
* **Version Control:** Git & GitHub

---

## Installation & Setup

### Install Dependencies

```bash
composer install
npm install
npm run build
```

### Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

---

### Run Database Migration

```bash
php artisan migrate
```

---

### Run the Application

```bash
php artisan serve
```

Access the system at:

```
http://127.0.0.1:8000
```

---

## Scheduler Setup

To enable auto-expiry locally, run:

```bash
php artisan schedule:work
```

This allows Laravel to automatically soft-delete expired newsletters.

---

## Notes

* No permanent deletion is implemented
* Expired content remains recoverable
* Designed for short-lived, real-world announcements

---

## Author

**Maryam Abdullah**
