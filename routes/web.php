<?php

use Illuminate\Support\Facades\Route;
//Endpoint trả về một View
Route::get('/', function () {
    return view('welcome');
});


//Endpoint trả về một String
Route::get('/string', function () {
    return 'Hello World';
});

//Enpoint trả về một JSON
Route::get('/json', function () {
    return response()->json([
        'name' => 'John Doe',
        'age' => 30
    ]);
});

//Endpoint trả về một Array
Route::get('/array', function () {
    return [
        1,
        2,
        3,
        4,
        5
    ];
});
