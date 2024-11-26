<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ninjas</title>
</head>

<body class="text-center px-8 py-12">
    <h1>The Laravel Ninjas</h1>
    <p>Click the button below to view the list of warriors</p>
    <a href="/ninjas" class="btn mt-4 inline-block">Find warriors</a>

</body>

</html>
