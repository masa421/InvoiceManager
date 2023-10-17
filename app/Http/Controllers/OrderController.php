<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request){
    	
    	$data=new Order;
    	$data->email= $request->email;
        $data->product_code = $request->code;
        $data->product_name = $request->name;
        $data->quantity = $request->quantity;
    	$data->order_status = 0;
        $data->save();
        return Redirect()->route('all.orders');
    	
    }
     public function newStore(Request $request){
        
        $data=new Order;
        $data->email= $request->email;
        $data->product_code = $request->code;
        $data->product_name = $request->name;
        $data->quantity = $request->quantity;
        $data->order_status = 0;
        $data->save();
        
        //customer_track
        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer === null){
            $data3=new Customer;
            $data3->name= $request->name;
            $data3->email= $request->email;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->phone = $request->phone;
            $data3->save();
        }
        return Redirect()->route('all.orders');
        
    }

    public function newformData(){

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);

        // $products = Product::all();
        $products = Product::where('user_id', $auth)->get();

        // $customers = Customer::get();
        $customers = Customer::where('user_id', $auth)->get();

        return view('Admin.new_order',compact('products','customers'));
    }

    public function ordersData(){

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);

        //$orders = Order::all();
        $orders = Order::where('user_id', $auth)->get();

        return view('Admin.all_orders',compact('orders'));
    }

    public function pendingOrders(){
        $orders = Order::where('order_status','=','0')->get();
        return view('Admin.pending_orders',compact('orders'));
    }

    public function deliveredOrders(){
        $orders = Order::where('order_status','!=','0')->get();
        return view('Admin.delivered_orders',compact('orders'));
    }
}
