# Command list for the project

- `php artisan serve` Run server
- `php artisan make:controller HomeController` Create a controller -> Home
    - create method index in `app/Http/Controllers/HomeController.php`
        ```php
        public function index(){
            $name = 'John Smith';
            return view('home', compact('name'));
        }
        ```
    - add route in `routes/web.php`
        ```php
        Route::get('/home', [HomeController::class, 'index'])->name('home.index');
        ```
    - create view page for `resources/views/home.blade.php`
        ```html
        <h1>Welcome {{$name}}</h1>
        ```
- `php artisan make:component Header` Create a View Component -> Header
    - New files created `app/View/Components/Header.php` and `resources/views/components/header.blade.php`
    - To call this component in a page add the `<x-header />` at the place where you want to insert it a view
    - If you want to pass parameters `<x-header name="A6K project"/>`
        - Add to class `Header` props name and modify constructor
            ```php
            public $name;
            public function __construct($name)
            {
                $this->name = $name;
            }
            ```
        - Call name in `resources/views/components/header.blade.php`
            ```html
            <h1>Header Component for {{$name}}</h1>
            ```
    - If you want to pass variables as parameters `<x-header name="A6K project" :owner="$owner"/>`