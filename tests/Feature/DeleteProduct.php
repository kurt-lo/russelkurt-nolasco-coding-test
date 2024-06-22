<?php

namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteProduct extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_product_by_id()
    {
        // Arrange
        $product = Products::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);
        $response->assertStatus(200)->assertJson([
            'message' => 'Product deleted successfully',
        ]);
    }
}
