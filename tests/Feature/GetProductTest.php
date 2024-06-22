<?php

namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_get_all_products()
    {
        Products::latest()->paginate(3);

        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_get_product_by_id()
    {
        $product = Products::factory()->create([
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 100,
        ]);

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'id' => $product->id,
                'name' => 'Test Product',
                'description' => 'This is a test product',
                'price' => 100,
            ],
            'message' => 'Product retrieved successfully',
        ]);
    }
}
