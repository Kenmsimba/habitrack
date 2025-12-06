<?php

use App\Http\Controllers\UnitController;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
        $units = Unit::select([
                'id',
                'property_type',
                'county',
                'town',
                'street',
                'rent',
                'size',
                'bathroom_number',
                'parking',
                'wifi',
                'pets_allowed',
                'backup_generator',
                'lift',
                'is_house_available',
                'photos',
                'phone_number'
            ])
            ->where('is_house_available', 'Yes') // optional: only show available ones
            ->latest()
            ->get();

        return Inertia::render('Landlord/ListApartments', [
            'units' => $units
        ]);
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

    // Optional: Nice clean URL version (e.g. /units/5-apartment-in-westlands)
    // Route::get('/units/{unit}', function (Unit $unit) {
    //     return Inertia::render('Landlord/ApartmentShow', [
    //         'unit' => $unit
    //     ]);
    // })->name('units.show');

    // Public route: View any unit by ID
    Route::get('/unit/{id}', function ($id) {
        $unit = Unit::findOrFail($id);

        return Inertia::render('Landlord/ApartmentShow', [
            'unit' => $unit->only([
                'id', 'property_type', 'county', 'town', 'street', 'pin',
                'rent', 'deposit', 'service_charge', 'water_electricity_billing',
                'payment_mode', 'bathroom_number', 'size', 'balcony',
                'kitchen_type', 'wardrobes', 'tiles', 'wifi', 'water_availability',
                'parking', 'security', 'lift', 'backup_generator', 'laundry_area',
                'pets_allowed', 'garbage_collection_area', 'photos', 'video',
                'is_house_available', 'minimum_lease_period', 'name', 'phone_number',
                'alternative_phone_number', 'landlord_agent', 'prefered_payment_method',
                'viewing_fee', 'viewing_schedule', 'created_at', 'updated_at'
            ])
        ]);
    })->name('unit.show');

    
});






// Tenants 

Route::prefix('tenant')->name('tenant.')->group(function () {

    Route::get('/apartments', function () {
            $units = Unit::select([
                    'id',
                    'property_type',
                    'county',
                    'town',
                    'street',
                    'rent',
                    'size',
                    'bathroom_number',
                    'parking',
                    'wifi',
                    'pets_allowed',
                    'backup_generator',
                    'lift',
                    'is_house_available',
                    'photos',
                    'phone_number'
                ])
                ->where('is_house_available', 'Yes') // optional: only show available ones
                ->latest()
                ->get();

            return Inertia::render('Tenant/ListApartments', [
                'units' => $units
            ]);
    })->name('apartments.index');

    Route::get('/find-home', function () {
return Inertia::render('Tenant/FilterList');
})->name('preferences');
    
});



// Guests 
// just use 'guest' (Fortify will handle post-login redirect)
Route::middleware('guest')->group(function () {

    // Register
    Route::get('/register', [RegisterController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Login
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// ──────────────────────────────────────────────────────────────
// Authenticated users
// ──────────────────────────────────────────────────────────────
// Route::middleware('auth')->group(function () {
//     Route::post('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])
//     ->name('logout');
// });

Route::get('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
 ->middleware('auth');