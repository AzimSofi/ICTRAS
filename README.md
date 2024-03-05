# ICTRAS - IIUM Credit Transfer System

## About ICTRAS
ICTRAS is a web-based application system developed for the Kulliyyah of Engineering at International Islamic University Malaysia (IIUM). It aims to streamline the process of credit transfer applications and approvals, making it more efficient and less reliant on manual, paper-based processes. With ICTRAS, students can apply for credit transfers online, and administrators can manage these applications and maintain digital records efficiently.

## System Requirements

- PHP
- Composer
- Node.js and npm

## Initial Setup
- `composer install` (php dependencies)
- `npm install` (npm package dependencies)
- `cp .env.example .env` (setup env)
- `php artisan key:generate`
- `php artisan migrate:fresh --seed` (setup database first)
- `npm run dev` or `prod`
- `php artisan serve`