<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Car;
use App\Models\Clent;
use App\Models\Clent_Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ClentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clents = Clent::all();

        return view('admin.clents.index',compact('clents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('admin.clents.create',compact('apartments',));
    }

    public function getDistrict(Request $request)
    {
        $district_ids = DB::table('apartment_car')->where('apartment_id', $request->id)->pluck('car_id');
        $district = Car::whereIn('id',$district_ids)->get();
        if (count($district) > 0) {
            return response()->json($district);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => "required",
            'email' => "required",
            'tel' => "required",
            'cars_id' => "required",
            'apartments_id' => "required",
        ]);
        $requestData = $request->all();

        Clent::create($requestData);
        return redirect()->route('admin.clents.index')->with('success','Clent created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
{
    $carclent = Clent_Car::where('cars_id',$id)->latest()->get();
    $appart = Apartment::find($id);
    $clents = Clent::where('apartments_id',$id)->latest()->get();


    return view('admin.clents.show', compact('carclent','appart','clents'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clent $clent)
    {
        $apartments = Apartment::all();
        return view('admin.clents.edit',compact('apartments','clent'));

    }
    public function getDistrictt(Request $request)
    {
        $district_ids = DB::table('apartment_car')->where('apartment_id', $request->id)->pluck('car_id');
        $district = Car::whereIn('id',$district_ids)->get();
        if (count($district) > 0) {
            return response()->json($district);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clent $clent)
    {
        $this->validate($request,[
            'name' => "required",
            'email' => "required",
            'tel' => "required",
            'cars_id' => "required",
            'apartments_id' => "required",
        ]);
        $requestData = $request->all();
        $clent->update($requestData);
        return redirect()->route('admin.clents.index')->with('success','Clent updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clent::destroy($id);
        return redirect()->route('admin.clents.index')->with('success','Clent Delete successfully!');

    }
}
