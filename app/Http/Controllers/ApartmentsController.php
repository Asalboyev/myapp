<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
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
    return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nom' => "required",
            'xona_soni' => "required",
            'maydon' => "required",
        ]);
        $requestData = $request->all();

        Apartment::create($requestData);
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
    public function edit(Apartment $apartment)
    {
        return view('admin.apartments.edit',compact('apartment'));
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
        return redirect()->route('admin.apartments.index')->with('success','Apartment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Apartment::destroy($id);
return redirect()->route('admin.apartments.index')->with('success','Apartment delete     successfully!');

    }
}
