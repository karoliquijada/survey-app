
# Survey App

Project build using Laravel 9 and Vue 3.


## Tech Stack

Laravel 9
Breeze + Inertia.js 
Chart.js 
Spatie Permissions
Laravel Sail (Docker environment)
Vue 3 + Bootstrap

## Requirements
PHP >= 8.0
Composer
MySQL >= 5.7
Node.js >= 14.x


## Installation

1. Clone the repositorie

```bash
  git clone https://github.com/karoliquijada/survey-app.git
```

2. Install PHP dependencies

```bash
  composer install
```

3. Install Node.js dependencies: 

```bash
  npm install 
```

4. Copy the .env.example file to .env and configure the necessary environment variables, such as the database connection.

```bash
  cp .env.example .env
```

5. Start the Laravel Sail environment:

```bash
./vendor/bin/sail up
```

You can add an alias for sail commands:

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

6. Run database migrations: 

```bash
sail artisan migrate
```

7. Seed the database: 

```bash
sail artisan db:seed
```

8. Access the application in your browser: http://localhost

Check out the seeders if you want to see all the credentials.

You can also login using the following credentials:

Admin user: erenyeager@example.com
Password: password 

User: arminarlert@example.com
Password: password

I did not seed the answers, so have fun completing the survey!









    
## Aditional notes

Ensure Docker Desktop is installed and properly configured to run Laravel Sail.
For development, use Docker Desktop's containers to replicate the production environment locally.
Laravel Sail simplifies local development by providing a Docker-powered local development environment for Laravel projects.
## Reference

Laravel Documentation: https://laravel.com/docs
Vue.js Documentation: https://v3.vuejs.org/guide/introduction.html
Inertia.js Documentation: https://inertiajs.com/
Spatie Laravel Permission Documentation: https://spatie.be/docs/laravel-permission/v5/introduction
Laravel Sail Documentation: https://laravel.com/docs/9.x/sail