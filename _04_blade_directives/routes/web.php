<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    # one can use $id to fetch record on the db
    return view('ninjas.ninja', ["id" => $id]);
});
