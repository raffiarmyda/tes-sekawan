<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request) {
        $orders = Order::all();
        $data = [];
        $categories = [];
        foreach ($orders as $or){
            $categories[] = $or->witel;
        }
        $order = Order::all()->groupBy('approval');
        foreach($order as $k=>$v){
            $data[$k] =  count($v);
        }
        return view('home',compact('orders','data','categories'),['title' => 'Home']);
    }
}
