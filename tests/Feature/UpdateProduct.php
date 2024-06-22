<?php

namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateProduct extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_product_by_id()
    {
        $products = Products::factory()->create();

        $response = $this->putJson('/api/products/' . $products->id, [
            'name' => 'Updated Test Product',
            'description' => 'This is an updated test product',
            'price' => 120.20,
        ]);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'name' => 'Updated Test Product',
                'description' => 'This is an updated test product',
                'price' => 120.20,
            ],
            'message' => 'Product updated successfully'
        ]);
    }
}
