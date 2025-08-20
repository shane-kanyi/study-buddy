# Study Buddy - Personalized Tutoring System

Study Buddy is a web application built with Laravel that connects students with qualified tutors for personalized learning sessions. This platform is based on a project proposal from Strathmore University's School of Computing and Engineering Sciences.

## Features

- **Student Accounts:** Students can register, search for tutors by subject, book sessions, and provide feedback.
- **Tutor Accounts:** Tutors can create profiles, list their subjects, set their availability, and get rated.
- **Admin Dashboard:** An administrator can verify tutors, manage users, and oversee the platform.
- **Session Scheduling:** A system for booking and managing tutoring sessions.
- **Ratings and Reviews:** A feedback mechanism to ensure quality tutoring.

## Tech Stack

- **Backend:** PHP 8.2, Laravel 10
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Database:** PostgreSQL
- **Development Environment:** Ubuntu, Composer, Node.js

## Setup and Installation (for Ubuntu)

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/shane-kanyi/study-buddy.git
    cd study-buddy
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install frontend dependencies:**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Configuration:**
    - Copy the example environment file: `cp .env.example .env`
    - Create a PostgreSQL database and user.
    - Update the `DB_*` variables in your `.env` file with your database credentials.

5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

6.  **Run Database Migrations:**
    ```bash
    php artisan migrate
    ```

7.  **Run the development server:**
    ```bash
    php artisan serve
    ```

The application will be available at `http://127.0.0.1:8000`.