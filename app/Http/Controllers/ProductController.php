<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        
    }
}
