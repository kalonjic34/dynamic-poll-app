# Dynamic Poll App

A simple dynamic polling application built with Laravel and Livewire. Users can create polls with multiple options and vote on available polls, with vote counts updating dynamically without requiring a full page reload.

## Features

* Create polls with a custom question/title
* Dynamically add and remove poll options
* Validate poll titles and options
* Support up to 10 poll options
* View all available polls
* Vote on poll options
* Display vote counts for each option
* Automatically refresh the poll list after creating a new poll
* Responsive interface styled with Tailwind CSS
* SQLite database for simple local development

## Built With

* **Laravel 13**
* **PHP 8.3+**
* **Livewire 4**
* **SQLite**
* **Eloquent ORM**
* **Blade**
* **Tailwind CSS**
* **Vite**
* **Composer**
* **NPM**

## How It Works

The application is built around three main database models:

* **Poll** - Stores the poll question/title.
* **Option** - Stores the available choices belonging to a poll.
* **Vote** - Stores votes associated with a poll option.

The relationships between these models allow the application to retrieve polls together with their options and vote counts.

When a user creates a poll, Livewire handles the form interaction and validation. The poll and its options are then saved to the database.

When a user votes, Livewire sends the request without requiring a traditional page refresh, and the updated vote count is displayed.

## Project Structure

```text
dynamic-poll-app/
├── app/
│   ├── Models/
│   │   ├── Option.php
│   │   ├── Poll.php
│   │   ├── User.php
│   │   └── Vote.php
│   └── Providers/
│
├── database/
│   ├── migrations/
│   │   ├── create_polls_table.php
│   │   ├── create_options_table.php
│   │   └── create_votes_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/
│   └── views/
│       ├── components/
│       │   ├── create-poll.blade.php
│       │   └── polls.blade.php
│       └── app.blade.php
│
├── routes/
│   └── web.php
│
├── package.json
├── composer.json
└── vite.config.js
```

## Getting Started

### Prerequisites

Make sure you have the following installed:

* PHP 8.3 or higher
* Composer
* Node.js and NPM
* SQLite

### Installation

1. Clone the repository:

```bash
git clone https://github.com/kalonjic34/dynamic-poll-app.git
```

2. Navigate into the project:

```bash
cd dynamic-poll-app
```

3. Install PHP dependencies:

```bash
composer install
```

4. Create the environment file:

```bash
cp .env.example .env
```

On Windows PowerShell, you can use:

```powershell
Copy-Item .env.example .env
```

5. Generate the application key:

```bash
php artisan key:generate
```

6. Create the SQLite database:

```bash
touch database/database.sqlite
```

On Windows, create an empty file named:

```text
database/database.sqlite
```

7. Run the database migrations:

```bash
php artisan migrate
```

8. Install frontend dependencies:

```bash
npm install
```

9. Start the Vite development server:

```bash
npm run dev
```

10. In another terminal, start the Laravel development server:

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

## Usage

### Creating a Poll

1. Enter a question in the poll title field.
2. Add the desired poll options.
3. Use **Add option** to dynamically create additional choices.
4. Remove unwanted options using the remove button.
5. Submit the form to create the poll.

The poll is saved along with its associated options.

### Voting

1. Find a poll under **Available Polls**.
2. Select an option.
3. Click **Vote**.
4. The vote count updates dynamically.

## Validation

Poll creation includes validation for:

* Poll title is required
* Poll title must contain at least 3 characters
* Poll title cannot exceed 255 characters
* Options must be provided as an array
* A maximum of 10 options can be added
* Individual options cannot be empty
* Individual options cannot exceed 255 characters

## Database Relationships

The application uses Eloquent relationships to connect polls, options, and votes:

```text
Poll
 └── hasMany → Options
                 └── hasMany → Votes
```

This allows the application to retrieve each poll's options and calculate the number of votes associated with each option.

## Learning Goals

This project was built as a Laravel learning project to practise:

* Laravel project structure
* Livewire components
* Reactive form handling
* Dynamic form fields
* Form validation
* Eloquent models and relationships
* Database migrations
* Creating related records
* Handling user interactions without full page reloads
* Blade templates
* Tailwind CSS
* SQLite database development

## Future Improvements

Potential improvements for the project include:

* Preventing users from voting multiple times on the same poll
* Adding user authentication
* Displaying poll results using percentage-based charts
* Adding the ability to edit or delete polls
* Adding poll expiration dates
* Adding pagination for larger numbers of polls
* Improving vote tracking and validation
