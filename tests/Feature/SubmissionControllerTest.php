<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Submission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_users_can_list_submissions()
    {
        // Create a sample authenticated user
        $user = User::factory()->create();
        $this->actingAs($user); // Simulate authenticated user
        
        // Create some sample submissions
        $submissions = Submission::factory()->count(3)->create();

        // Hit the endpoint
        $response = $this->get('/submission');

        // Assert status code
        $response->assertStatus(200);

        // Assert that all submissions are present in the response
        foreach ($submissions as $submission) {
            $response->assertSee($submission->id);
        }
    }
}
