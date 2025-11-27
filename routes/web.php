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

// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'auth' => [
//             'user' => auth()->user() ? ['name' => auth()->user()->name] : null
//         ]
//     ])->name('home');
// });

Route::get('/test', fn() => Inertia::render('Test'));


// Landlord Section (protected later with middleware)
Route::prefix('landlord')->name('landlord.')->group(function () {

    Route::get('/apartments', function () {
        return Inertia::render('Landlord/ListApartments');
    })->name('apartments.index');

    Route::get('/apartments/create', function () {
        return Inertia::render('Landlord/AddApartment');
    })->name('apartments.create');

    Route::get('/apartments/{id}/edit', function ($id) {
        return Inertia::render('Landlord/EditApartment', [
            'id' => $id,
            // Later: fetch apartment data here
        ]);
    })->name('apartments.edit');
});