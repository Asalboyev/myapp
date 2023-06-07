<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $this->validate($request,[
            'model' => 'required',
            'number' => 'required',
            'apartments_id' => 'required',
        ]);
        $requestData = $request->all();

        return Car::create($requestData);

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {

         $car->update($request->all());
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return 'ok';
    }
    public function yangiliklar(Request $req) {
        try{
            $data = Yangiliklar::all();
            return response()->json([
                'ok' => true,
                'data' => $data,
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'ok' => false,
                'msg' => $e->getMessage(),
            ]);
        }
    }

}
