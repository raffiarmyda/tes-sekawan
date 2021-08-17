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
        $vehicle = Vehicle::all();
        return view('Vehicle.vehicle',compact('vehicle'),["title" => "Vehicle"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vehicle.create_vehicle',["title" => "Vehicle"]);
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
            'vehicle_name' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);
        Vehicle::create([
            'vehicle_name'=>$request->vehicle_name,
            'type'=>$request->type,
            'description'=>$request->description,
            'rent_company'=>$request->rent_company
        ]);
        return redirect('/vehicle')->with('status', 'Data User Berhasil Ditambahkan!');
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
    public function edit($id)
    {
        $vehicle = Vehicle::findorfail($id);
        return view('Vehicle.edit_vehicle',compact('vehicle'),["title" => "Vehicle"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findorfail($id);
        $vehicle->update([
            'vehicle_name'=>$request->vehicle_name,
            'type'=>$request->type,
            'description'=>$request->description,
            'rent_company'=>$request->rent_company
        ]);
        return redirect('/vehicle')->with('edit', 'Data Driver Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findorfail($id);
        $vehicle->delete();
        return back()->with('delete', 'Data Vehicle Berhasil Dihapus!');
    }
}
