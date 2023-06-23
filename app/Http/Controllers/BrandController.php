<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;

class BrandController extends Controller
{
    public function getAllBrand()
    {
        // $products = Product::all();
        $brands = Brand::all();
        
        // var_dump($products);
        return response()->json([
            'message'   =>  'Successfully get data',
            'data'      => $brands
        ]);
    }

    public function createBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $brand = Brand::create([
            'name'      =>  $request->name,
        ]);

        // $product = Product::create($request->all());

        // var_dump($brand);


        return response()->json([
            'message'   => 'Successfully created data',
            'data'      => $brand
        ]);
    }


    public function getBrandId($id)
    {
        $brand = Brand::findOrFail($id);

        return response()->json([
            'message'   =>  'Successfully get data',
            'data'      =>  $brand
        ]);
    }

    public function updateBrandId(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $brand = Brand::find($id)->update([
            'name'  =>  $request->name
        ]);

        return response()->json([
            'message'   => 'Successfully updated data',
            'data'      => $brand
        ]);
    }

    public function deleteBrandId($id)
    {
        $brand = Brand::find($id)->delete();

        return response()->json([
            'message'   => 'Successfully deleted data'
        ]);
    }

    public function searchBrand(Request $request) {
        $brand = Brand::where('name', 'LIKE', '%'.$request->name.'%')->get();

        return response()->json([
            'message'   => 'Successfully searched data',
            'data'      => $brand
        ]);
    }

}
