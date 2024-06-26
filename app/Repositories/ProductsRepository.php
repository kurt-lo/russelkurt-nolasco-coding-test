<?php

namespace App\Repositories;

use App\Models\Products;

class ProductsRepository
{
    // variable products
    protected $products;

    // constructor of ProductRepository
    // Products $products is a parameter from models
    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function getAllProductsRepository(int $perPage)
    {
        return $this->products::latest()->paginate($perPage);
        // return $Products::latest()->paginate($perPage);
    }

    public function getAllProductsNameRepository(int $perPage)
    {
        return $this->products::select('name')->latest()->paginate($perPage);
    }

    public function getProductByIdRepository(int $id)
    {
        return $this->products::findOrFail($id);
    }

    public function createProductRepository(array $data)
    {
        return $this->products::create($data);
    }

    public function updateProductRepository(int $id)
    {
        return $this->products::findOrFail($id);
    }

    public function deleteProductRepository(int $id)
    {
        return $this->products::findOrFail($id);
    }
}
