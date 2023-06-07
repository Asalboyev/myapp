<?php

namespace App\Http\Controllers;


use App\Models\Clent_Car;
use Illuminate\Http\Request;

class Clents_CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clent_cars = Clent_Car::all();
        return view('admin.index',compact('clent_cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => "required",
            'tel' => "required",
            'cars_id' => "required",
            'message' => "required",
        ]);
        $requestData = $request->all();

        Clent_Car::create($requestData);
        return redirect()->route('index')->with('success','Clent_Car created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Clent_Car $car)
    {
        return view('admin.cars.show',compact('car'));
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
        Clent_Car::destroy($id);
        return redirect()->route('admin.clentscar.index')->with('success','Clent_Car Delete successfully!');

    }
}
