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
