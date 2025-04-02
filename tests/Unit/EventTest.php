<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_creation()
    {
        $event = Event::create([
            'name' => 'Tech Conference',
            'description' => 'An event for developers',
            'date' => '2025-04-15',
            'capacity' => 100,
            'country' => 'USA'
        ]);

        $this->assertDatabaseHas('events', ['name' => 'Tech Conference']);
    }
}
