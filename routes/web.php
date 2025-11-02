<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return Inertia::render('Home'); //Matches pages/Home.vue
// });

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/', function () {
    return Inertia::render('Home', [
        'auth' => [
            'user' => auth()->user() ? ['name' => auth()->user()->name] : null
        ]
    ]);
});

Route::get('/test', fn() => Inertia::render('Test'));
