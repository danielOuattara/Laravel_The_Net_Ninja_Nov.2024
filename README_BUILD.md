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

## 5 - Layouts and Slots

```php
# /views/components/layout.php

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>
</head>

<body>

    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="/ninjas">See all warriors</a>
            <br>
            <a href="/ninjas/create">Add warrior</a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>

</html>
```

```php
# /views/ninjas/index.php
<x-layout>
    <h2>Currently available Laravel Ninjas</h2>
    @if ($greetings === 'Hello great warriors')
        <p>Hi from inside the if statement</p>
    @endif
    <p>{{ $greetings }}</p>
    <p>Click in each warrior to see details</p>
    <ul>
        @foreach ($ninjas as $ninja)
            <li>
                <a href="/ninjas/{{ $ninja['id'] }}">{{ $ninja['name'] }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
```

```php
# /views/ninja.php
<x-layout>
    <h2>Single Ninja id = {{ $id }}</h2>
</x-layout>
```

```php
# /views/create.php

<x-layout>
    <h2>Add warrior</h2>

    <form action="POST">
        <label for="name">
            Ninja name:
            <input type="text" name="name" id="name">
        </label>
        <br>
        <label for="country">
            Country :
            <input type="text" name="country" id="country">
        </label>
    </form>
</x-layout>
```

```php
# /routes/web.php

Route::get('/ninjas/create', function () {
    return view('ninjas.create');
});

Route::get('/ninjas/{id}', function ($id) {
    # one can use $id to fetch record on the db
    return view('ninjas.ninja', ["id" => $id]);
});
```

## 6 - Components attributes and props

```php
# /views/components/card.blade.php

@props(['superNinja' => false, 'highlight' => false])

<div @class([
    'highlight' => $highlight,
    'card',
    'super-ninja' => $superNinja,
])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn">View details</a>
    {{-- OR --}}
    <a {{ $attributes }} class="btn">View details</a>
</div>
```

```php
# /views/ninjas/index.blade.php

<x-layout>
    <h2>Currently available Laravel Ninjas</h2>

    @if ($greetings === 'Hello great warriors')
        <p>Hi from inside the if statement</p>
    @endif

    <p>{{ $greetings }}</p>

    <p>Click in each warrior to see details</p>

    <ul>
        @foreach ($ninjas as $ninja)
            <li>
                <x-card href="ninjas/{{ $ninja['id'] }}" :superNinja="true" :highlight="$ninja['skill'] > 70">
                    <h3>{{ $ninja['name'] }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout>
```

## 7 - Adding CSS and TailwindCSS

## 8 - Database migrations

### Artisan Commands

```sh
# Check all artisan commands
php artisan  

# Get help with make commands
php artisan make --help

# Create a migration file for creating the 'todos' table
php artisan make:migration create_todos_table

# Check the status of all migrations
php artisan migrate:status

# Run the migrations to update the database
php artisan migrate

# Roll back the last batch of migrations
php artisan migrate:rollback

# Reset the database by rolling back all migrations
php artisan migrate:reset

```php
# update the content of the newly created migration file

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title'); //<-- added
            $table->boolean('completed'); //<-- added
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
```

```sh
# run the migration to the database
php artisan migrate

# check status (optional)
php artisan migrate:status

# undo the last database migration
php artisan migrate:rollback

# create a new migration: add a 'shareable' column the the todos table 
php artisan make:migration add_shareable_to_todos_table --table=todos

# Create a new migration: add a 'shareable' column to the todos table 
php artisan make:migration add_shareable_to_todos_table --table=todos

```

```php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->boolean('shareable')->default(false); // Add the column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('shareable'); // Remove the column
        });
    }
};

```

```sh
# check status (optional)
php artisan migrate:status

# run the migration to the database
php artisan migrate

# undo the last database migration
php artisan migrate:rollback
```

## 9 - Eloquent Models

### Create a Model, Migration, Factory and Seed

```sh
# get some help for make:model
php artisan make:model --help

# create a Model + Migration + Factory + Seed
php artisan make:model Ninja -mfs

# output:
   INFO  Model [app/Models/Ninja.php] created successfully.  

   INFO  Factory [database/factories/NinjaFactory.php] created successfully.  

   INFO  Migration [database/migrations/2024_11_21_133459_create_ninjas_table.php] created successfully.  

   INFO  Seeder [database/seeders/NinjaSeeder.php] created successfully.  
```

### update the create Ninjas table Migration Up() function

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ninjas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // <- new 
            $table->integer('skill'); // <- new
            $table->text('bio'); // <- new
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninjas');
    }
};
```

### run a migration to the database

```sh
# check status
php artisan migrate:status

  Migration name .................................................................................................................... Batch / Status  
  0001_01_01_000000_create_users_table ..................................................................................................... [1] Ran  
  0001_01_01_000001_create_cache_table ..................................................................................................... [1] Ran  
  0001_01_01_000002_create_jobs_table ...................................................................................................... [1] Ran  
  2024_11_21_121028_create_todos_table ..................................................................................................... [2] Ran  
  2024_11_21_133459_create_ninjas_table .................................................................................................... Pending

# run the migration to the database
php artisan migrate

   INFO  Running migrations.  

  2024_11_21_133459_create_ninjas_table ................................................................................................ 7.27ms DONE
```

### Working on the Model

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{

    protected $fillable = ["name", "skill", "bio"]; // <-- New
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;
}
```

### Play with tinker tool

```sh
php artisan tinker

# specify the namespace for a Model to be usable
use App\Models\Ninja
Ninja::create(['name'=> 'mario', 'skill'=> 76, 'bio' => 'lorem Lauren Lauraine'])

# output:

= App\Models\Ninja {#5216
    name: "mario",
    skill: 76,
    bio: "lorem Lauren Lauraine",
    updated_at: "2024-11-21 14:16:44",
    created_at: "2024-11-21 14:16:44",
    id: 1,
  }

# Add another
Ninja::create(['name'=> 'yoshi', 'skill'=> 60, 'bio' => 'lorem Lauren Lauraine'])


# Now fetch the document using the model
Ninja::all()
= Illuminate\Database\Eloquent\Collection {#5269
    all: [
      App\Models\Ninja {#5272
        id: 1,
        created_at: "2024-11-21 14:16:44",
        updated_at: "2024-11-21 14:16:44",
        name: "mario",
        skill: 76,
        bio: "lorem Lauren Lauraine",
      },
      App\Models\Ninja {#5273
        id: 2,
        created_at: "2024-11-21 14:18:03",
        updated_at: "2024-11-21 14:18:03",
        name: "yoshi",
        skill: 60,
        bio: "lorem Lauren Lauraine",
      },
    ],
  }
  
# Find ninja with id=2
Ninja::find(2)
= App\Models\Ninja {#5270
    id: 2,
    created_at: "2024-11-21 14:18:03",
    updated_at: "2024-11-21 14:18:03",
    name: "yoshi",
    skill: 60,
    bio: "lorem Lauren Lauraine",
  }

```
