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
        $apartments = Apartment::where('taken',0)->latest()->get();
        $cars = Car::all();
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
// dd($request->all());

        $this->validate($request,[
            'name' => "required",
            'email' => "required",
            'tel' => "required",
            'apartments_id' => "required",
        ]);
        $requestData = $request->all();

        $cancel = Apartment::findOrfail($request->apartments_id);
//    dd($cancel);
        $cancel->update([
            'taken' =>1
        ]);
        $clents = Clent::create($requestData);
        $clents->cars()->attach($request->cars);

        return redirect()->route('admin.clents.index')->with('success','Clent created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Clent $clent)
{
    $appart = Apartment::find($clent->id);
//    $clents = Clent::where('apartments_id',$id)->latest()->get();


    return view('admin.clents.show', compact('appart','clent'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Clent $clent)
    {
        $tags = Apartment::where('taken',0)->latest()->get();

        $clent = Clent::findOrFail($clent->id);

        // Update the 'taken' value to 0 for all associated apartments
        $clent->apartments()->update(['taken' => 0]);
        // Additional code as needed
        
        $apartments  = Apartment::where('taken',0)->latest()->get();
        $cars = Car::all();
        return view('admin.clents.edit',compact('apartments','clent','cars'));
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
        // dd($clen t->all());
        $this->validate($request,[
            'name' => "required",
            'email' => "required",
            'tel' => "required",
            'apartments_id' => "required",
        ]);
        $requestData = $request->all();
        $clent->update($requestData);
        $clent->cars()->sync($request->cars);


        $cancel = Apartment::findOrfail($request->apartments_id);
//    dd($cancel);
        $cancel->update([
            'taken' =>1
        ]);      return redirect()->route('admin.clents.index')->with('success','Clent updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $clent = Clent::findOrFail($id);
        
        // Get the apartments associated with the client
        $apartments = $clent->apartments;
        
        // Update the 'taken' value to 0 for all associated apartments
        $apartments->each(function ($apartment) {
            $apartment->update([
                'taken' => 0
            ]);
        });
        
    
        $clent->delete();
    
        return redirect()->route('admin.clents.index')->with('success', 'Clent deleted successfully!');
    }
    
    
    
}
