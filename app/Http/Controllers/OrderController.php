<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        return view('Order.order',compact('order','vehicle','driver'),["title" => "Order"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        return view('Order.create_order',compact('driver','vehicle'),["title" => "Order"]);
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
            'drivers_id' => 'required',
            'vehicles_id' => 'required'
        ]);
        Order::create($request->all());
        return redirect('/order')->with('status', 'Data Order Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $order = Order::find($id);
        $order -> update([
            'approval' => 'Accept'
        ]);
        return redirect('/order')->with('edit', 'Berhasil Validasi');
    }

    public function decline($id)
    {
        $order = Order::find($id);
        $order -> update([
            'approval' => 'Decline'
        ]);
        return redirect('/order')->with('edit', 'Berhasil Validasi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        $order = Order::findorfail($id);
        return view('Order.edit_order',compact('order','vehicle','driver'),["title" => "Order"]);
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
        $order = Order::find($id);
        $order -> update($request->all());
        return redirect('/order')->with('edit', 'Data Order Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findorfail($id);
        $order->delete();
        return back()->with('delete', 'Data Order Berhasil Dihapus!');
    }
}
