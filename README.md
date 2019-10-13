# PistonPosición: Mantenimientos

## Getting started

1. Clone the repo.

2. Install composer dependencies:
    ```sh
    cd app
    composer install
    ```

3. Run migrations:
    ```sh
    php artisan migrate
    ```

4. Seed the database:
    ```sh
    php artisan db:seed
    ```

5. Give `storage/` and `bootstrap/cache/` all the permissions they need:
    ```sh
    chmod -R 777 storage/
    chmod -R 777 bootstrap/cache/
    ```

6. Generate all the CSS and Javascript:
    ```sh
    npm run dev
    ```
## Protip

If you just added or renamed a file, run:
```sh
composer dumpautoload
```
To regenerate the optimized files. I always forget this.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-source software licensed under the [MIT
license](https://opensource.org/licenses/MIT).
