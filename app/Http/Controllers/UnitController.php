<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::orderBy('rent', 'asc')->paginate(12);
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit = Unit::findOrFail($id);
        return view('units.show', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'property_type'              => 'required|string|max:50',
        'county'                     => 'required|string|max:100',
        'town'                       => 'required|string|max:100',
        'street'                     => 'required|string|max:255',
        'pin'                        => 'nullable|string|max:20',

        'rent'                       => 'required|numeric|min:1000|max:99999999.99',
        'deposit'                    => 'required|numeric|min:0|max:99999999.99',
        'service_charge'             => 'required|string|max:100',
        'water_electricity_billing'  => 'required|integer|min:0|max:50000',

        'payment_mode'               => 'required|string|in:Monthly,Quarterly,Yearly',
        'bathroom_number'            => 'required|integer|min:1|max:20',
        'size'                       => 'required|string|max:50',

        'balcony'                    => 'required|string|in:Yes,No',
        'kitchen_type'               => 'required|string|max:100',
        'wardrobes'                  => 'required|string|max:100',
        'tiles'                      => 'required|string|max:100',
        'wifi'                       => 'required|string|max:100',
        'water_availability'         => 'required|string|max:100',
        'parking'                    => 'required|string|max:150',
        'security'                   => 'required|string|max:200',
        'lift'                       => 'required|string|in:Yes,No',
        'backup_generator'           => 'required|string|max:100',
        'laundry_area'               => 'required|string|in:Yes,No',
        'pets_allowed'               => 'required|string|max:100',
        'garbage_collection_area'    => 'required|string|in:Yes,No',

        'photos'                     => 'required|string|max:1000',
        'video'                      => 'nullable|url|max:500',

        'is_house_available'         => 'required|string|in:Yes,No',
        'minimum_lease_period'       => 'required|string|max:100',

        'name'                       => 'required|string|max:150',
        'phone_number'               => 'required|string|regex:/^0[0-9]{9}$/',
        'alternative_phone_number'   => 'nullable|string|regex:/^0[0-9]{9}$/',
        'landlord_agent'             => 'required|string|in:Landlord,Agent',
        'prefered_payment_method'    => 'required|string|max:100',

        'viewing_fee'                => 'nullable|integer|min:0|max:100000',
        'viewing_schedule'           => 'nullable|string|max:255',
    ]);

    Unit::create($validated);

    // Unit::create($request->all()); 

    return redirect()->route('landlord.apartments.index')->with('success', 'Unit added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = Unit::query();

        if ($request->filled('town')) {
            $query->where('town', 'like', '%' . $request->town . '%');
        }
        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }
        if ($request->filled('max_rent')) {
            $query->where('rent', '<=', $request->max_rent);
        }

        $units = $query->orderBy('rent')->paginate(12);
        return view('units.index', compact('units'));
    }
}
