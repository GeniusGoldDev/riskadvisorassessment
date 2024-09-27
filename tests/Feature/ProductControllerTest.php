<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function it_can_list_products()
    {
        // Create some sample products
        $products = Product::factory()->count(3)->create();

        // Hit the endpoint
        $response = $this->get('/product');

        // Assert status code
        $response->assertStatus(200);

        // Assert that all products are present in the response
        foreach ($products as $product) {
            $response->assertSee($product->name);
            $response->assertSee($product->description);
        }
    }
}
