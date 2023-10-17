<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class admin extends Controller
{

    public function getCustomer(Request $r)
    {
        $customer = Customer::find($r->id);
        return response()->json([
            'customer' => $customer,
            'msg' => 'success'
        ]);
    }

    public function getProduct(Request $request)
    {

        $product = Product::where([['category', '=' , $request->category],['user_id', '=', $request->user_id ]])->get();
        return response()->json([
            'product' => $product,
            'msg' => 'success',
            //'userid' => $auth,
            'request' => $request,
            'category' => $request->category
        ]);
    }
}
