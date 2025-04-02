<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index(Request $request)
    {
        $events = $this->eventService->getAllEvents($request->all());

        return response()->json($events, 200);
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        try {
            $event = $this->eventService->createEvent($request->validated());
            return response()->json(['message' => 'Event created successfully', 'event' => $event], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json($event, 200);
    }

    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        try {
            $updatedEvent = $this->eventService->updateEvent($event, $request->validated());
            return response()->json(['message' => 'Event updated successfully', 'event' => $updatedEvent], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Event $event): JsonResponse
    {
        try {
            $this->eventService->deleteEvent($event);
            return response()->json(['message' => 'Event deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }
}
