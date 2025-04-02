<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Services\AttendeeService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreAttendeeRequest;
use App\Http\Requests\UpdateAttendeeRequest;

class AttendeeController extends Controller
{
    protected $attendeeService;

    public function __construct(AttendeeService $attendeeService)
    {
        $this->attendeeService = $attendeeService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->attendeeService->getAllAttendees(), 200);
    }

    public function store(StoreAttendeeRequest $request): JsonResponse
    {
        try {
            $attendee = $this->attendeeService->createAttendee($request->validated());
            return response()->json(['message' => 'Attendee created successfully', 'attendee' => $attendee], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Attendee $attendee): JsonResponse
    {
        return response()->json($attendee, 200);
    }

    public function update(UpdateAttendeeRequest $request, Attendee $attendee): JsonResponse
    {
        try {
            $updatedAttendee = $this->attendeeService->updateAttendee($attendee, $request->validated());
            return response()->json(['message' => 'Attendee updated successfully', 'attendee' => $updatedAttendee], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Attendee $attendee): JsonResponse
    {
        try {
            $this->attendeeService->deleteAttendee($attendee);
            return response()->json(['message' => 'Attendee deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
        }
    }
}
