# Yummy Restaurant

Yummy Restaurant is a restaurant management system built with Laravel 11, using Laravel UI and Vite for the dashboard interface, Bootstrap Made for the frontend, and phpMyAdmin as the database management tool.

## Features
- **User Authentication**: Implemented using Laravel UI
- **Role-Based Access Control**: Define roles such as 'operator' and 'owner' to manage access to different features
- **Dashboard**: A dynamic dashboard powered by Vite
- **Responsive Frontend**: Built using Bootstrap Made for a modern, responsive user experience
- **Database Management**: Handled with phpMyAdmin for easy database interaction

## Technologies Used
- **Laravel 11**: The PHP framework used for building the entire application.
- **Laravel UI**: For setting up authentication scaffolding.
- **Vite**: A fast and modern build tool used for the dashboard's frontend assets.
- **Bootstrap Made**: A pre-built Bootstrap template for styling and layout.
- **Mailtrap**: mailtrap to send booking emails and receive booking status emails.
- **PHPMyAdmin**: For database management.
- **MySQL**: The relational database used in this project.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/yummy-restaurant.git
   cd yummy-restaurant
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Set up environment variables**:
   Copy the `.env.example` to `.env` and configure the necessary settings such as database credentials:
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

5. **Set up database**:
   Create a database using phpMyAdmin, then run migrations:
   ```bash
   php artisan migrate
   ```

6. **Run the project**:
   ```bash
   php artisan serve
   npm run dev
   ```

## Usage

Once the server is up and running, you can access the Yummy Restaurant dashboard by navigating to `http://localhost:8000` in your browser.

You will have access to the following roles:
- **Operator**: Can view and manage orders but has restricted access to certain features.
- **Owner**: Full access to manage restaurant settings and menu items.

## Contributing
Feel free to contribute to the project by submitting a pull request or opening an issue.
