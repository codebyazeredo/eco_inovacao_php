<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'start_event' => 'required|date',
            'end_event' => 'required|date|after:start_event',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    public function getEventById($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        return response()->json($event);
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function getAllEvents()
    {
        return response()->json(Event::all());
    }

    public function findByUserId($userId)
    {
        return response()->json(Event::where('user_id', $userId)->get());
    }

    public function findEventByIntervalData(Request $request)
    {
        $events = Event::whereBetween('start_event', [$request->start_event, $request->end_event])->get();
        return response()->json($events);
    }

    public function findByLocalAndIntervalData(Request $request)
    {
        $events = Event::where('local', $request->local)
            ->whereBetween('start_event', [$request->start_event, $request->end_event])
            ->get();
        return response()->json($events);
    }
}
