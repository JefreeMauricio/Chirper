<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends \Tests\TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guests_can_post_a_chirp(): void
    {
        $response = $this->post('/chirps', [
            'message' => 'Hello from the test suite',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('chirps', [
            'message' => 'Hello from the test suite',
        ]);
    }
}
