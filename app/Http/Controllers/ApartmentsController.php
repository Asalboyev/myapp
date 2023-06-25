<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Car;
use App\Models\Clent;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index',compact('apartments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Car::where('taken',0)->latest()->get();

        return view('admin.apartments.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        $this->validate($request,[
            'nom' => "required",
            'xona_soni' => "required",
            'maydon' => "required",
        ]);

        $requestData = $request->all();

         $apartment = Apartment::create($requestData);
         $apartment->tags()->attach($request->tags);
         $cars = Car::all();
         $selectedCars = $request->tags; // Assuming 'tags' is the name of your select multiple input field

         foreach ($cars as $car) {
             if (in_array($car->id, $selectedCars)) {
                 $car->update([
                     'taken' => $car->taken + 1
                 ]);
             } else {
                 $car->update([
                     'taken' => $car->taken
                 ]);
             }
         
    }
        return redirect()->route('admin.apartments.index')->with('success','Tuzilma created successfully!');

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
    public function edit(Request $request, Apartment $apartment)
    {
        $tags = Car::where('taken',0)->latest()->get();

        $apartment = Apartment::findOrFail($apartment->id);

        // Get the IDs of the selected cars from the form
        $selectedCarIds = $request->input('tags', []);
        
        // Get the cars associated with the apartment
        $cars = $apartment->tags;
        
        // Set the 'taken' value to 0 for all associated cars
        foreach ($cars as $car) {
            $car->taken = 0;
            $car->save();
        }
        
        // Set the 'taken' value to 1 for the selected cars
        foreach ($selectedCarIds as $carId) {
            $car = Car::findOrFail($carId);
            $car->taken = 1;
            $car->save();
        }
        $tags = Car::where('taken',0)->latest()->get();

        // Delete the apartment
        return view('admin.apartments.edit',compact('apartment','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        $this->validate($request,[
            'nom' => "required",
            'xona_soni' => "required",
            'maydon' => "required",
        ]);
        $requestData = $request->all();
        $apartment->update($requestData);
        $apartment->tags()->sync($request->tags);
        $allCars = Car::all();
       $selectedCars = $request->tags; // Assuming 'tags' is the name of your select multiple input field

foreach ($allCars as $car) {
    if (in_array($car->id, $selectedCars)) {
        $car->update([
            'taken' => 1
        ]);
    } else {
        if ($car->taken != 1) {
            $car->update([
                'taken' => 0
            ]);
        }
    }
}

        return redirect()->route('admin.apartments.index')->with('success','Apartment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
    
        // Get the cars associated with the apartment
        $cars = $apartment->tags;
    
        // Set the 'taken' value to 0 for the associated cars
        foreach ($cars as $car) {
            $car->taken = 0;
            $car->save();
        }
    
        // Delete the apartment
        $apartment->delete();
    
        // Additional code or redirect as needed
    
    
        return redirect()->route('admin.apartments.index')->with('success','Apartment delete     successfully!');

        // Additional code or redirect as needed
    } 
    

}
