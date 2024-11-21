# README BUILD PROJECT (Laravel 11.9)

## 1 - Introduction & Setup

- install `PHP`, `Composer` and the `Laravel` Installer

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux)"
```

- create a new Laravel application

```bash
laravel new <project_name>
```

- install all `package.json` packages

```bash
cd <project_directory> && npm i
```

- explaining application files & folders:

  - `app/` contains most of the application core logic
  - `database/` where to handle all databases tasks
  - `resources/` for any un-compiled frontend code (JS and CSS files), and `views/` which contains templates that render on the server
  - `routes/` where to register all the routes for the application
  
  - `composer.json` for Namespaces registry
  - `boostrap/` for bootstrapping a Laravel app
  - `config/` which have the main application settings
  - `public/` as root folder for publicly accessible items in the application
  - `storage/` as stock zone
  - `test/`
  - `vendor/` which contains all the packages to run the application
  - `.env` file, CAUTION do not version this file, add to .gitignore
  - `.artisan` file useful to execute commands, like start the application server `more traditionally`

- run the application: `php artisan serve`

## 2 - Routes & Views

- create a new view and render it

```php
# routes/web.php

Route::get('/ninjas', function () {
    return view('ninjas.index');
});
```

```bash
resources/
├── css
│   └── app.css
├── js
│   ├── app.js
│   └── bootstrap.js
└── views
    ├── ninjas
    │   └── index.blade.php
    └── welcome.blade.php
```

```php
# resources/views/ninjas.index.blade.php

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Ninjas | Home</title>
    </head>
    <body>
        <h2>Currently available Laravel Ninjas</h2>
        
        <ul>
            <li>Ninja 1</li>
            <li>Ninja 2</li>
        </ul>
    </body>
</html>
```

## 3 - Route WildCards & View Data

```php
# /routes/web.php

Route::get('/ninjas', function () {
    $ninjas = [
        ["id" => "1", "name" => "mario", "skill" => 75],
        ["id" => "2", "name" => "luigi", "skill" => 45],
    ];
    return view('ninjas.index', [
        "greetings" => "Hello great warriors",
        "ninjas" => $ninjas
    ]);
});

Route::get('/ninjas/{id}', function ($id) {
    # fetch record with $id
    return view('ninjas.ninja', ["id" => $id]);
});
```

```php
# /views/ninja.blade.php

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Ninjas | Home</title>
    </head>
    <body>
        <h2>Currently available Laravel Ninjas</h2>

        <p>{{$greetings}}</p>
        
        <ul>
            <li>
                <a href="/ninjas/{{$ninjas[0]["id"]}}">{{$ninjas[0]["name"]}}</a>
            </li>
            <li>
                <a href="/ninjas/{{$ninjas[1]["id"]}}">{{$ninjas[1]["name"]}}</a>
            </li>
        </ul>
    </body>
</html>
```

## 4 - Blade directives

```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ninjas | Home</title>
</head>

<body>
    <h2>Currently available Laravel Ninjas</h2>

    @if ($greetings === 'Hello great warriors')
        <p>Hi from inside the if statement</p>
    @endif

    <p>{{ $greetings }}</p>

    <p>Click in each warrior to see details</p>

    <ul>
        {{-- <li>
                <a href="/ninjas/{{$ninjas[0]["id"]}}">{{$ninjas[0]["name"]}}</a>
            </li>
            <li>
                <a href="/ninjas/{{$ninjas[1]["id"]}}">{{$ninjas[1]["name"]}}</a>
            </li> --}}

        @foreach ($ninjas as $ninja)
            <li>
                <a href="/ninjas/{{ $ninja['id'] }}">{{ $ninja['name'] }}</a>
            </li>
        @endforeach
    </ul>
</body>

</html>
```
