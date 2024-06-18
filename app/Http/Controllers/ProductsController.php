<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsController extends Controller
{
    // Method toreturn all products (Product list)
    public function index()
    {
        return Products::latest()->paginate(3);

        // return all products but only the name of it and paginated
        // return Products::select('name')->latest()->paginate(4);
    }

    // Method to return single product (Product detail)
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

    // Method to create new product (Create product)
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

    // Method to update product (Update product)
    public function update(Request $request, $id)
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

        // find product by id
        $product = Products::findOrFail($id);

        // update product
        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'updated_at' => now(),
        ]);

        // return the response with succes message and status code
        return response()->json([
            'data' => $product,
            'message' => 'Product updated successfully',
        ], 200);
    }

    // Method to delete product (Delete product)
    public function destroy($id)
    {
        // find product by id
        $product = Products::findOrFail($id);

        // delete product
        $product->delete();

        // return response with success message and status code
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
