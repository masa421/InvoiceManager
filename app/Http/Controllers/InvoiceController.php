<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function store(Request $request){
    	
    	$data = new Invoice;

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);
        // var_dump($request);
        // file_put_contents("sample.txt", $request);

        // For Debugging POST Data
        /*
        ob_start();
        var_dump($_POST);
        $dump = ob_get_contents();
        ob_end_clean();
        file_put_contents( 'sample.txt', $dump ); // C:\xampp\htdocs\InvoiceManager\public\sample.txt 
        */

        $data->customer_name= $request->c_name;
    	$data->customer_mail= $request->email;
        $data->company = $request->company;
        $data->address = $request->address;
        $data->item = $request->item;
    	$data->product_name = $request->product_name;
    	$data->price = $request->sale_price;
    	$data->quantity = $request->quantity;
        $data->total = $request->total;
        $data->payment = $request->payment;
        $data->user_id = $request->user_id;
        $data->due = $request->total - $request->payment;
    	$data->user_id = $auth;
        $data->save();

        //order_track
        $productCode = Product::where('name',$request->product_name)->first();
        $data2=new Order;
        $data2->email= $request->email;
        $data2->product_code = $productCode->product_code;
        $data2->product_name = $request->product_name;
        $data2->quantity = $request->quantity;
        $data2->order_status = 1;
    	$data2->user_id = $auth;
        $data2->save();

        //customer_track
        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer === null){
            $data3=new Customer;
            $data3->name= $request->customer;
            $data3->email= $request->email;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->phone = $request->phone;
            $data3->save();
        }

        $products = DB::table('products')->where('category',$request->item)->first();
        $mainqty = $products->stock;
        $nowqty = $mainqty - $request->quantity;

        DB::table('products')->where('name',$request->name)->update(['stock' => $nowqty]);
        Order::where('email',$request->email)->update(['order_status'=>'1']);

        return view('Admin.invoice_details',compact('data'));


        // return Redirect()->route('add.invoice');
    }

    public function formData($id){
        $order = Order::where('id',$id)->first();
        $product = Product::where('product_code',$order->product_code)->first();
        $customer = Customer::where('email',$order->email)->first();
        return view('Admin.add_invoice',compact('order','product','customer'));
    }

    public function newformData(){

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);

        // filtered customer
        $customers = Customer::where('user_id', $auth)->get();

        //$products = Product::all();
        $products = Product::where('user_id', $auth)->get();
        
        if($customers->count() > 0 && $products->count() > 0){
            // $customers = Customer::all();
            return view('Admin.new_invoice',compact('products','customers'));
        }else{
            // You can't make invoice without Customer and Product
            return back()->with('message', 'You need Customer and Products');
        }

    }


    public function allInvoices(){

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);

        // Original
        // $invoices = Invoice::all();

        // filtered customer
        $invoices = Invoice::where('user_id', $auth)->get();

        return view('Admin.all_invoices',compact('invoices'));
    }

    public function soldProducts(){
        $products = Invoice::select('product_name', Invoice::raw("SUM(quantity) as count"))
        ->groupBy(Invoice::raw("product_name"))->get();
       // ?print_r($products);
        return view('Admin.sold_products',compact('products'));
    }

    public function delete(){
        Invoice::truncate();
    }

    public function edit($id)
    {
        // $customers = Customer::where('id' ,'=',$id)->get();     
        // return view('Admin.edit_customer',compact('customers'));

        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);

        // Org
        // $data =  Invoice::find($id);

        $invoices_count = Invoice::where('id', $id)->where('user_id', $auth)->count();
        if($invoices_count != 1){
            abort(500);
        }

        // filtered customer
        $company = Company::where('user_id', $auth)->first();

        $data = Invoice::where('id', $id)->where('user_id', $auth)->first();

        //dd($company);
        return view('Admin.invoice_details',compact('data','company'));
    }    
}
