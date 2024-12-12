<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function index()
    // {
    //     $products = Product::all();
    //     return response()->json([
    //         'message' => 'Product get successfully',
    //         'product' => $products
    //     ], 201);
        
    // }
    public function store(Request $request)
    {   
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        $product = Product::create($validation);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
}
