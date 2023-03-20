<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function createProduct(Request $request)
    {
        $product = Product::create([
            'name'      =>  $request->product_name,
            'price'     =>  $request->price,
            'desc'      =>  $request->description
        ]);

        return response()->json([
            'message'   => 'Successfully created data',
            'data'      => $product
        ]);
    }

    public function getAllProduct()
    {
        $products = Product::all();

        return response()->json([
            'message'   =>  'Successfully get data',
            'data'      => $products
        ]);
    }
    
    public function getProductId($id)
    {

        $product = Product::findOrFail($id);
        
        return response()->json([
            'message'   =>  'Successfully get data',
            'data'      =>  $product
        ]);
    }

    public function deleteProductId($id)
    {
        $product = Product::find($id)->delete();

        return response()->json([
            'message'   => 'Successfully deleted data'
        ]);
    }

}
