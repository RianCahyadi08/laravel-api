<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function createProduct(Request $request)
    {
        Product::create([
            'name'      =>  $request->product_name,
            'price'     =>  $request->price,
            'desc'      =>  $request->description
        ]);

        return response()->json([
            'message'   => 'Successfully created data',
        ]);
    }

    public function getAllProduct()
    {
        // $products = DB::table('products')->get();
        $products = Product::all();

        return response()->json([
            'message'   => 'Successfully get data',
            'data'      => $products
        ]);
    }
}
