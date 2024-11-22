<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    @vite('resources/css/app.css')
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
