<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('admin.cars.create',compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'model' => 'required',
            'number' => 'required',
            'color' => 'required',
            'year' => 'required',
        ]);
        $requestData = $request->all();

        Car::create($requestData);
        return redirect()->route('admin.cars.index')->with('success','Tuzilma created successfully!');

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
    public function edit(Car $car)
    {
        $apartments = Apartment::all();
        return view('admin.cars.edit',compact('car','apartments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $this->validate($request,[
            'model' => 'required',
            'number' => 'required',
            'color' => 'required',
            'year' => 'required',
            ]);
        $requestData = $request->all();
        $car->update($requestData);
        return redirect()->route('admin.cars.index')->with('success','Car updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::destroy($id);
        return redirect()->route('admin.cars.index')->with('success','Car Delete successfully!');


    }
}