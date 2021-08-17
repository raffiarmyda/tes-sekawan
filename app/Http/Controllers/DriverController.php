<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        return view('Driver.driver',compact('driver'),["title" => "Driver"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Driver.create_driver',["title" => "Driver"]);
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
            'driver_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'license' => 'required',
            'phone_number' => 'required'
        ]);
        Driver::create([
            'driver_name'=>$request->driver_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'license'=>$request->license,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect('/driver')->with('status', 'Data Driver Berhasil Ditambahkan!');
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
        $driver = Driver::findorfail($id);
        return view('Driver.edit_driver',compact('driver'),['title'=>'Driver']);
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
        $driver = Driver::findorfail($id);
        $driver->update([
            'driver_name'=>$request->driver_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'license'=>$request->license,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect('/driver')->with('edit', 'Data Driver Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::findorfail($id);
        $driver->delete();
        return back()->with('delete', 'Data User Berhasil Dihapus!');
    }
}
