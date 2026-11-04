# WiNews

WiNews is a Laravel-based news portal for reading, searching, and managing Indonesian-language articles.

## Overview

The application provides a public news-reading experience and an authenticated editorial area. Readers can browse a featured story and category sections, search articles, open article pages, and participate in comment threads. Administrators can create, edit, and delete articles.

The repository includes both the application source and a Laravel 11 project scaffold. The implementation uses server-rendered Blade views and Laravel web routes; it does not expose a separate API.

## Features

- **Editorial homepage:** Displays the most-viewed article, recent articles, and stories from eight configured categories.
- **Article pages:** Shows article content, author information, publication date, view tracking, and comments. The share control copies the current page URL.
- **Article search:** Searches article titles, subtitles, and body text. The current controller returns at most 10 results.
- **Accounts and comments:** Supports registration, login, logout, authenticated comment submission, and deletion of a user's own comments.
- **Editorial management:** Administrators can create, update, and delete articles, including uploading JPG or PNG images up to 2 MB.
- **Responsive interface:** Blade views use shared layouts and custom Vite-managed CSS and JavaScript.

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 11, Blade, Eloquent ORM
- **Frontend:** HTML, custom CSS, vanilla JavaScript, Bootstrap 5.3 (CDN), Vite 5
- **JavaScript package:** Axios
- **Database:** SQLite is the default in `.env.example`; Laravel database configuration also defines other connection drivers.
- **Testing:** PHPUnit 11 through Laravel's test runner
- **Dependency managers:** Composer and npm

## Project Structure

```text
app/
  Http/Controllers/       Public account, article, and admin request handling
  Http/Middleware/        Role-based route middleware
  Models/                 Article, user, and comment models
bootstrap/                Laravel application bootstrap
config/                   Application, authentication, database, and service configuration
database/
  migrations/             Application and Laravel infrastructure tables
  seeders/                Sample users, articles, and comments
public/
  berita/                 Uploaded and sample article images
  static/                 Shared image assets
  index.php               HTTP entry point
resources/
  css/                    Vite entry stylesheet and design system
  js/                     Vite entry JavaScript
  views/                  Public, authentication, and admin Blade templates
routes/
  web.php                 Named web routes
tests/
  Feature/                HTTP feature tests
  Unit/                   Unit tests
```

### Data model

The core application tables are:

- `pengguna`: user name, email, password, and role.
- `berita`: title, subtitle, body, image path, category, view count, author, and timestamps.
- `komentar`: comment body and references to its article and author.

Articles belong to a user and have many comments. Comments belong to an article and a user. The migrations also create Laravel support tables for sessions, cache, and queued jobs.

## Installation and Setup

### Prerequisites

- PHP 8.2 or newer, with the extensions required by Laravel. The repository's CI workflow enables `pdo_sqlite` for SQLite.
- Composer
- Node.js and npm (Vite 5 requires a supported Node.js runtime)
- SQLite for the default local database configuration

### Local development

1. Install PHP dependencies:

   ```sh
   composer install
   ```

2. Create the local environment file. Use the command for your shell:

   ```powershell
   Copy-Item .env.example .env
   ```

   ```sh
   cp .env.example .env
   ```

3. Generate an application key and create the default SQLite database file if it does not exist:

   ```sh
   php artisan key:generate
   php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
   ```

4. Install frontend dependencies:

   ```sh
   npm ci
   ```

5. Apply database migrations:

   ```sh
   php artisan migrate
   ```

6. Build frontend assets:

   ```sh
   npm run build
   ```

7. Start the Laravel development server:

   ```sh
   php artisan serve
   ```

   Open the local URL printed by Artisan, usually `http://127.0.0.1:8000`.

For frontend development with Vite's watcher, run `npm run dev` in a separate terminal while the Laravel server is running.

### Optional sample data

For a fresh local database only, sample content can be inserted with:

```sh
php artisan db:seed
```

The seeders create sample accounts, 80 articles, and comments. The user seeder contains fixed demo credentials in source code; inspect and replace them before local use, and never run these seeders in production.

## Usage

The existing named web routes include:

| Page or action | Method | Path |
| --- | --- | --- |
| Homepage | `GET` | `/` |
| Login form | `GET` | `/authlogin` |
| Registration form | `GET` | `/authregister` |
| Login | `POST` | `/login` |
| Registration | `POST` | `/register` |
| Logout | `POST` | `/logout` |
| Search | `GET` | `/cari` |
| Article detail | `GET` | `/berita/{id}` |
| Admin dashboard | `GET` | `/admin/dashboard` |
| New article form | `GET` | `/admin/berita/form` |
| Create article | `POST` | `/admin/berita/store` |
| Edit article form | `GET` | `/admin/berita/{id}/edit` |
| Update article | `PUT` | `/admin/berita/{id}` |
| Delete article | `DELETE` | `/admin/berita/{id}` |
| Add comment | `POST` | `/berita/{id}/komentar` |
| Delete comment | `DELETE` | `/komentar/{id}` |

Search accepts a `query` parameter, for example `/cari?query=Teknologi`. Admin article-management routes require an authenticated user with the `admin` role. Comment routes require authentication; comment deletion checks that the current user owns the comment.

## Screenshots

Screenshots are not currently included in the repository. Add captures of the public homepage, article page, search results, and admin interface when publishing a portfolio preview.

## Testing

Run the test suite with:

```sh
php artisan test
```

The current suite contains one basic homepage response test and one placeholder unit test. The GitHub Actions workflow runs PHPUnit on PHP 8.2 and 8.3. These tests do not currently cover authentication, article management, search, comments, or database migrations.

## Known Limitations and Future Improvements

The following are observations or proposals, not claims of implemented functionality:

- **Review public role assignment before deployment.** The registration form and controller currently accept both `admin` and `pembaca` roles. Public self-registration can therefore request administrator access.
- **Review demo account handling.** Seeder passwords are fixed in the repository. Replace the sample values and avoid seeding production databases.
- **Improve search behavior.** Search currently checks title, subtitle, and article body, but not the category column; it also returns at most 10 results without pagination.
- **Expand automated coverage.** Add tests for authentication and authorization, article CRUD, search, comments, and migrations.
- **Add maintained screenshots.** Capture current public and admin pages for portfolio visitors.

## License

`composer.json` declares the project package as MIT licensed. A `LICENSE` file is not present in the repository; confirm the intended distribution terms before publishing.
