<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Consumer;
use App\Models\Submission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsumerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_authenticated_users_can_list_consumers()
    {
        // Create a sample authenticated user
        $user = User::factory()->create();
        $this->actingAs($user); // Simulate authenticated user
        
        // Create some sample consumers
        $consumers = Consumer::factory()->count(3)->create();

        // Hit the endpoint
        $response = $this->get('/consumer');

        // Assert status code
        $response->assertStatus(200);

        // Assert that all consumers are present in the response
        foreach ($consumers as $consumer) {
            $response->assertSee($consumer->email);
        }
    }

    /** @test */
    public function it_can_store_a_consumer()
    {
        // Create sample data for the request
        $data = [
            "first_name"=>"John",
            "last_name"=>"Doe",
            "email"=>"johndoe@gmail.com",
            "phone"=>"07039566540",
            "contact_preference"=>"email",
        ];

        // Hit the endpoint
        $response = $this->post('/consumer', $data);

        // Assert status code
        $response->assertStatus(201);

        // Assert that the response contains the newly created consumer
        $response->assertJsonFragment([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'contact_preference' => $data['contact_preference']
        ]);
    }

   
    /** @test */
    public function it_can_store_products_for_a_submission()
    {
        // Create a sample submission
        $submission = Submission::factory()->create();

        // Create sample products
        $products = Product::factory()->count(3)->create();
        
        // Get the product IDs as an array
        $productIds = $products->pluck('id')->toArray();

        // Create sample data for the request
        $data = [
            'submission_id' => $submission->id,
            'product_ids' =>  $productIds // Sample product IDs
        ];

        // Hit the endpoint
        $response = $this->post("/consumer/store_products", $data);

        // Assert status code
        $response->assertStatus(201);

        // Assert that the submission's products have been synced
        $this->assertEquals($data['product_ids'], $submission->fresh()->products->pluck('id')->toArray());
    }
}
