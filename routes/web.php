<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('Home'); //Matches pages/Home.vue
});

Route::get('/test', fn() => Inertia::render('Test'));
