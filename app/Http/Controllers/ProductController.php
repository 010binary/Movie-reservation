<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function index(): JsonResponse
    {

        $data = Product::all();

        return response()->json([
            'message' => 'Product list retrieved successfully!',
            'data' => $data
        ])->setStatusCode(200, 'OK');
    }

    public function store(Request $request): JsonResponse
    {
        // validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'string',
            'price' => 'required|numeric',
            'qty' => 'required|integer|min:1'
        ]);

        // create a new product
        Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully!',
            'data' => Product::all()
        ])->setStatusCode(201, 'Created');
    }
}
