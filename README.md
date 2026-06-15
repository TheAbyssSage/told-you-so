# Tell You — Psychotherapist Booking App

A Laravel 13 + Filament v5 booking application for clients and psychologists.
It includes user booking, psychologist availability management, a low-code Filament admin panel, and a dedicated psychologist dashboard.

## Features

- User registration and login
- Client dashboard with availability browsing and appointment booking
- Psychologist panel for managing availability and viewing booked sessions
- Filament admin resources for users, clients, psychologists, availabilities, and bookings
- Seeded sample data for admin, psychologist users, and appointments

## Requirements

- PHP 8.4+ compatible runtime
- Composer
- Node.js + npm
- Database configured in `.env`

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
```

If you want live frontend rebuilding while developing:

```bash
npm run dev
```

## Running the app

```bash
php artisan serve
```

Then visit `http://127.0.0.1:8000`.

## Seeded accounts and sample data

The seeder creates:

- an admin user at `admin@dkv.be` / `password`
- psychologist users for seeded psychologists with `password`
- sample availability slots and booked sessions

## Routes of note

- `/` — public home page
- `/register`, `/login` — auth flow
- `/dashboard` — client dashboard
- `/availability` — browse psychologist availability
- `/bookings` — view your bookings
- `/psychologist/dashboard` — psychologist panel
- `/psychologist/availabilities` — manage psychologist availability
- `/psychologist/bookings` — view psychologist bookings
- `/admin` — Filament admin panel (admin users only)

## Testing

Run the test suite with:

```bash
php artisan test
```

## Notes

- Psychologist access is controlled by the `is_psychologist` flag and linked `psychologist_id` on the `users` table.
- Appointment booking limits and availability state are enforced in application logic.

## License

This project is licensed under the MIT license.
