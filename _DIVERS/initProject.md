# Project Initiation

**_Verify that you have installed the following programs on your machine :_**

- [NodeJS](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/downloads) _command line_

# Initiation procedure

1. Clone the repository
2. Move in the folder for project
3. Make the command :
    - `composer install`
    - `npm install`
    - `npm run dev`
4. Copy file `.env.example` and rename is `.env`
5. Modify the file `.env` so that it contains your DB connection information.
6. Make the command :
    - `php artisan migration`
    - `php artisan serve`