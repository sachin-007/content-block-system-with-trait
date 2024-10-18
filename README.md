# Laravel Content Block System with trait

A simple content block system built with Laravel, allowing users to create pages with multiple content blocks (text and images). This project is structured to be easily extended in the future.

## Features
- **Page Management**: Create, view, and list pages.
- **Content Block System**: Add text or image content blocks to pages.
- **Polymorphic Relationships**: The `ContentBlock` model uses polymorphic relationships to attach to different models.

## Requirements

- PHP >= 8.0
- Composer
- Laravel 9.x
- MySQL (or any other database supported by Laravel)

## Installation

### Step 1: Clone the repository

```bash
git clone https://github.com/sachin-007/content-block-system-with-trait.git
cd content-block-system-with-trait
```

### Step 2: Install dependencies

```bash
composer install
```

### Step 3: Set up environment variables

Copy the .env.example to .env and configure the database credentials:

```bash
cp .env.example .env
```
Edit .env to match your local environment:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=BMSA
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 4: Generate application key

```bash
php artisan key:generate
```

### Step 5: Run migrations

```bash
php artisan migrate
```

### Step 6: Start the Laravel server

```bash
php artisan serve
```

The application should now be running at http://127.0.0.1:8000.

## Usage

### Create a Page

1. Visit the URL `/` to see the list of all pages.
2. Click on the "Create New Page" button.
3. Fill out the form with the title and description and click "Create Page."

### Add Content Blocks to a Page

1. After creating a page, navigate to the page view by clicking on its title in the list.
2. You can add content blocks to the page using the provided form. Add either text or image content by choosing the type and filling out the content.

## API Routes

- **List Pages**: `/`
- **Show Page**: `/pages/{id}`
- **Create Page**: `/create`
- **Store Page**: `POST /pages`
- **Store Content Block**: `POST /pages/{id}/content-blocks`

## Project Structure

The main components of this project include:

- **PageController**: Manages pages and content blocks.
- **Page Model**: Stores page information (title and description).
- **ContentBlock Model**: Handles content (text or image) blocks.
- **HasContentBlocks Trait**: Provides a reusable way to manage content blocks for any model.

### Key Models

- **Page**: Represents a page in the application.
- **ContentBlock**: Represents a content block (either text or image).

### Key Routes

| Route                        | Method | Description                    |
|------------------------------|--------|--------------------------------|
| `/`                          | GET    | List all pages                 |
| `/pages/{id}`                | GET    | Show a single page             |
| `/create`                    | GET    | Form to create a new page      |
| `/pages`                     | POST   | Store a new page               |
| `/pages/{id}/content-blocks` | POST   | Add a content block to a page  |


Here is an example of how the page creation looks:

![ home ](/storage/app/public/snapshots/index.png)
![ create page and add block ](/storage/app/public/snapshots/particular_page.png)
