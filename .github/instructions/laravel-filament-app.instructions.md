---
name: laravel-filament-app
description: "Use when implementing the Laravel + Filament psychotherapist booking app, including admin panels, resources, migrations, relations, auth, email verification, 2FA, and user booking limits."
applyTo:
  - "**/*.php"
  - "**/*.md"
  - "**/routes/*.php"
  - "**/resources/**/*.blade.php"
---

# Project Instruction

This project is a Laravel 13 application with Filament v5 and PHP 8.4.
The assistant should build the app with the following priorities and conventions.

## Core Requirements

- Use Laravel and Filament for the admin panel and CRUD resources.
- Prefer artisan generation commands when available:
  - `php artisan make:filament-resource`
  - `php artisan make:filament-page`
  - `php artisan make:migration`
  - `php artisan make:model`
- Implement migrations with strong relational integrity and foreign keys.
- Interlink migrations logically: clients → users, psychologists → sessions/availability, users → bookings, triage details.
- Model relations clearly using `belongsTo`, `hasMany`, `hasOne`, and inverse relations.

## Admin Requirements

- Build a Filament admin section for managing:
  - Clients
  - Client users
  - Psychologists
  - Session types/availability
  - Bookings
- Admin can create clients such as `@dkv.be`, `@elias.be`, `@min.fed.be`.
- Every user belonging to a client may book up to 2 sessions.
- Psychologists must be able to offer sessions and availability.

## User Requirements

- User registration with email verification link.
- Two-factor authentication (2FA) enabled for login security.
- Users must log in again after registration and verification.
- Present an initial triage flow that collects:
  - ADHD, autism, anxiety conditions
  - Medication status: yes/no
  - Current treatment status: yes/no
- Provide pages or routes for ADHD, autism, and anxiety information.
- All users can view psychologist availability.
- Users may book a maximum of 2 appointments. If they try to book more, deny with a clear message.

## Filament / Panel Guidelines

- Use Filament resources for CRUD and admin management.
- Use Filament pages for custom flows like triage, availability, and booking dashboards.
- Use `Select::make()->relationship()` for relations and avoid manual foreign-key form fields.
- Use proper Filament table filters and actions for booking state and availability.

## Documentation & Delivery

- Confirm behavior by checking official docs when unsure.
- Use Laravel/Filament docs for authentication, email verification, 2FA, resource generation, and migrations.
- Ensure `README.md` includes installation steps and public GitHub repo usage guidance.
- Keep instructions concise and oriented toward code quality, relations, and generated resources.
