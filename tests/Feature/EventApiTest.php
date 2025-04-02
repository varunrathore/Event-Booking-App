<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_event()
    {
        $response = $this->postJson('/api/v1/events', [
            'name' => 'Tech Meetup',
            'description' => 'Networking event',
            'date' => '2025-05-10',
            'capacity' => 50,
            'country' => 'UK'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Event created successfully',
            ]);

        $this->assertDatabaseHas('events', ['name' => 'Tech Meetup']);
    }

    public function test_event_list()
    {
        Event::factory()->create([
            'name' => 'Testing Event',
            'country' => 'India'
        ]);

        $response = $this->getJson('/api/v1/events');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Testing Event']);
    }
}
