<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // {
        $vehicle = Vehicle::select('*')->where('vStatus','=','1')->get();
        $vehicle_count = $vehicle->count();
        return view('parking.vehicle', compact('vehicle', 'vehicle_count'));

    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'vModel' => 'required',
            'vBrand' => 'required',
            'vType' => 'required',
            'vPlatenum' => 'required',
            'vPrice' => 'required',
            // 'vStatus' => 'required'
        ]);
        // dd($request);

        $vehicle = new Vehicle();
        $vehicle->vModel = $request->vModel;
        $vehicle->vBrand = $request->vBrand;
        $vehicle->vType = $request->vType;
        $vehicle->vPlatenum = $request->vPlatenum;
        $vehicle->vPrice = $request->vPrice;
        // $vehicle->vStatus = $request->vStatus;

        if ($vehicle->save()){
            return redirect('/vehicle')->with('status','Sucessfully save');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {

        //
        // $request->validate([
        //     'vModel' => 'required',
        //     'vBrand' => 'required',
        //     'vType' => 'required',
        //     'vPlatenum' => 'required',
        //     'vPrice' => 'required',
        //     'vStatus' => 'required'
        // ]);
        
        // $vehicle = Vehicle::find($array[0]);
        // $vehicle->vModel = $request->vModel;
        // $vehicle->vBrand = $request->vBrand;
        // $vehicle->vType = $request->vType;
        // $vehicle->vPlatenum = $request->vPlatenum;
        // $vehicle->vPrice = $request->vPrice;
        // $vehicle->vStatus = 1;
        // $arr = array("done", "archive");
        // if(in_array($cond, $arr)){
        //     if($cond == $arr[0]) $vehicle->update(['vStatus' => 2]);
        //     if($cond == $arr[1]) $vehicle->update(['isDeleted' => 2]);
        // } 
       
        $vehicle->update(['vStatus' => 2]);
        return redirect('/vehicle');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect('/vehicle');   
    }


}