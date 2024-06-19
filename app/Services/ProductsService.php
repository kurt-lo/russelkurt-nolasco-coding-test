<?php

namespace App\Services;

use App\Repositories\ProductsRepository;
use Illuminate\Support\Facades\Cache;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsService
{
    // variable called productsrepository
    protected $productsRepository;

    // constructor of ProductsService
    // ProductsRepository $productsRepository is a parameter from ProductsRepository.php
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function getAllProductsServices(int $perPage)
    {
        return $this->productsRepository->getAllProductsRepository($perPage);
    }

    public function getAllProductsNameServices(int $perPage)
    {
        return $this->productsRepository->getAllProductsNameRepository($perPage);
    }

    public function getProductsByIdServices(int $id)
    {
        try {
            $cacheKey = 'product_' . $id; // cache key

            // cache the product by id, no expiration for the cache since its rememberforever
            $cacheProduct = Cache::rememberForever($cacheKey, function () use ($id) {
                return $this->productsRepository->getProductByIdRepository($id);
            });

            return response()->json([
                'data' => $cacheProduct,
                'message' => 'Product retrieved successfully',
            ]);
        } catch (ModelNotFoundException $e) { // catch if product not found
            return response()->json([
                'error' => "Product not found." . "<br>" . $e->getMessage(),
            ], 404);
        }
    }

    public function createNewProductServices()
    {
        // validate the request
        $validator = Validator::make(request()->all(), [
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
        $results = $this->productsRepository->createProductRepository($data);

        // return response with success message and status code
        return response()->json([
            'data' => $results,
            'message' => 'Product created successfully',
        ], 201);
    }

    public function updateProductServices(int $id)
    {
        // validate the request
        $validator = Validator::make(request()->all(), [
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

        // find product by id coming from the productrepository class
        $product = $this->productsRepository->updateProductRepository($id);

        // update product
        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'updated_at' => now(),
        ]);

        Cache::forget('product_' . $id); // remove product from cache after updating it

        // return the response with succes message and status code
        return response()->json([
            'data' => $product,
            'message' => 'Product updated successfully',
        ], 200);
    }

    public function deleteProductServices(int $id)
    {
        // find product by id comin from the product repository class
        $product = $this->productsRepository->deleteProductRepository($id);

        // delete product
        $product->delete();

        Cache::forget('product_' . $id); // remove product from cache after deletion of it

        // return response with success message and status code
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
