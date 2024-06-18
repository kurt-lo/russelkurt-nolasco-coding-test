<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsController extends Controller
{
    // Method toreturn all products
    public function index()
    {
        // latest product will be shown first and paginated
        return Products::latest()->paginate(3);
    }

    // Method to return single product
    public function show($id)
    {
        try { // find product by id
            $product = Products::findOrFail($id);
            return response()->json($product);
        } catch (ModelNotFoundException $e) { // catch if product not found
            return response()->json([
                'error' => "Product not found." . "<br>" . $e->getMessage(),
            ], 404);
        }
    }

    // Method to create new product
    public function create(Request $request)
    {
        // validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);

        // check if validation fails, return 400 if true
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
            ], 400);
        }

        // validated data
        $data = $validator->validated();

        // create new product
        $results = Products::create($data);

        // return response with success message and status code
        return response()->json([
            'data' => $results,
            'message' => 'Product created successfully',
        ], 201);
    }
}
