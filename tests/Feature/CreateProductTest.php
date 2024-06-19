<?php

namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_create_product_factory()
    {
        Products::factory(30)->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $productData = [
            'name' => 'Banana Test',
            'description' => 'Delicious banana.',
            'price' => 99.99,
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', [
            'name' => 'Banana Test',
            'description' => 'Delicious banana.',
            'price' => 99.99,
        ]);
    }
}
