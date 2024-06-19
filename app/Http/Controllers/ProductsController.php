<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    // variable called productsService
    protected $productsService;

    // constructor of ProductController
    // ProductsService $productsService is a parameter from ProductsService.php
    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }

    // Method toreturn all products (Product list)
    public function index()
    {
        return $this->productsService->getAllProductsServices(3);
    }

    public function indexName()
    {
        return $this->productsService->getAllProductsNameServices(3);
    }

    // Method to return single product (Product detail)
    public function show(int $id)
    {
        return $this->productsService->getProductsByIdServices($id);
    }

    // Method to create new product (Create product)
    public function store()
    {
        return $this->productsService->createNewProductServices();
    }

    // Method to update product (Update product)
    public function update(int $id)
    {
        return $this->productsService->updateProductServices($id);
    }

    // Method to delete product (Delete product)
    public function destroy(int $id)
    {
        return $this->productsService->deleteProductServices($id);
    }
}
