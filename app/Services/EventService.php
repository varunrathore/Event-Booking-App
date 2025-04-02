<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    public function getAllEvents($filters)
    {
        $query = Event::query();

        // Apply filters if provided
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['date'])) {
            $query->whereDate('date', $filters['date']);
        }

        if (!empty($filters['country'])) {
            $query->where('country', $filters['country']);
        }

        // Paginate results (default 10 per page)
        return $query->paginate($filters['per_page'] ?? 10);
    }

    public function createEvent(array $data)
    {
        return Event::create($data);
    }

    public function updateEvent(Event $event, array $data)
    {
        $event->update($data);
        return $event;
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
    }
}
