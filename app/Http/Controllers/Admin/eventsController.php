<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\events\StoreRequest;
use App\Models\event;
use App\Models\Group;
use App\Repositories\Panel\eventEloquent;
use Illuminate\Http\Request;
use App\Models\Seat ;
use Illuminate\Support\Facades\DB ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $event;

    public function __construct(eventEloquent $eventEloquent)
    {
        $this->event = $eventEloquent;
    }

    public function index(event $event)
    {
        return view('panel.events.index');
    }

    public function getDataTable()
    {
        return $this->event->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->event->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = event::find($id);

        $groups = Group::with(['seats' => function ($query) use ($id) {
            $query->leftJoin('reserved_seats', function ($join) use ($id) {
                $join->on('seats.seat_number', '=', 'reserved_seats.seat_number')
                    ->where('reserved_seats.event_id', '=', $id);
            })
                ->select('seats.*', 'reserved_seats.reservation_id')->orderBy('id');
        }])->get();
        return view('panel.events.show', compact('event', 'groups'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->event->edit($id);
        return view('panel.events.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, StoreRequest $request)
    {
        $response = $this->event->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }


    public function delete($id)
    {
        $response = $this->event->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

    public function getSeats($groupId, $event_id)
    {

        // Fetch all seats in the group
        $seats = Seat::where('group_id', $groupId)->get();

        // Map the seats to include their reservation status based on the reserved_seats table
        $seats = $seats->map(function ($seat) use ($event_id) {
            $isReserved = DB::table('reserved_seats')
                ->where('seat_number', $seat->seat_number)
                ->where('event_id', $event_id)
                ->exists();

            return [
                'seat_number' => $seat->seat_number,
                'is_reserved' => $isReserved,
            ];
        });

        return response()->json(['seats' => $seats]);
    }

    /* Change Reservation  places */
    public function change_seat_postition(Request $request)
    {
        // Retrieve and validate the input data
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'event_id' => 'required|exists:events,id',
            'current_seat_number' => 'required|exists:seats,seat_number',
            'target_seat_number' => 'required|exists:seats,seat_number',
        ]);

        // Retrieve the current and target seat reservations
        $currentReservation = DB::table('reserved_seats')
            ->where('event_id', $validated['event_id'])
            ->where('seat_number', $validated['current_seat_number'])
            ->first();

        $targetReservation = DB::table('reserved_seats')
            ->where('event_id', $validated['event_id'])
            ->where('seat_number', $validated['target_seat_number'])
            ->first();

        try {
            // Handle the seat reservation exchange logic
            if ($currentReservation && $targetReservation) {
                // Both seats are reserved: swap reservation IDs
                DB::table('reserved_seats')
                    ->where('id', $currentReservation->id)
                    ->update(['reservation_id' => $targetReservation->reservation_id]);

                DB::table('reserved_seats')
                    ->where('id', $targetReservation->id)
                    ->update(['reservation_id' => $currentReservation->reservation_id]);
            } elseif ($currentReservation && !$targetReservation) {
                // Current seat is reserved, target seat is not: move reservation
                DB::table('reserved_seats')
                    ->where('seat_number', $currentReservation->seat_number)
                    ->delete();

                DB::table('reserved_seats')
                    ->insert([
                        'seat_number' => $validated['target_seat_number'],
                        'reservation_id' => $currentReservation->reservation_id,
                        'event_id' => $validated['event_id'] // Ensure the event_id is included for new entries
                    ]);
            }

            return redirect()->back()->with('success', 'Updated Successfully');
        } catch (\Exception $e) {
            // Handle exceptions and redirect with error message
            return redirect()->back()->withErrors(['error' => 'Failed to update seat positions. Please try again.']);
        }
    }

    //Create Multi events
    public function createMultipleUserEvent()
    {
        return view('panel.events.create_multi_event');
    }

    //Store Multi Event
    public function addMultipleUserEvent(Request $request)
    {
        $data = $request->all();
        if (empty($data['e_events_status'])) {
            $data['e_events_status'] = 0;
        }

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'e_events_name' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'start_time' => 'required',
            'end_time' => 'required',
            'e_events_available' => 'required|integer|min:0',
            'e_events_description' => 'nullable|string',
            'days' => 'required|array',
        ]);

        // If validation fails, return errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if days are provided
        if (!empty($data['days'])) {
            $start_date = Carbon::parse($data["start"]);
            $end_date = Carbon::parse($data["end"]);

            // Calculate the total number of days between start and end dates
            $days_range = $start_date->diffInDays($end_date);

            for ($i = 0; $i <= $days_range; $i++) {
                // Calculate the current date
                $current_date = $start_date->copy()->addDays($i);

                // Update start and end times with the correct date for each iteration
                $start_time = Carbon::parse($data["start_time"])->format('H:i');
                $end_time = Carbon::parse($data["end_time"])->format('H:i');

                $start = Carbon::parse($current_date->format('Y-m-d') . " " . $start_time);
                $end = Carbon::parse($current_date->format('Y-m-d') . " " . $end_time);

                // Prepare data for inserting the event
                $insert_data = [
                    'e_events_name' => $data['e_events_name'],
                    'e_events_date' => $start->format('Y-m-d'),
                    'e_events_from' => $start->format('H:i'),
                    'e_events_to' => $end->format('H:i'),
                    'e_events_available' => $data['e_events_available'],
                    'e_events_status' => $data['e_events_status'],
                    'e_events_description' => $data['e_events_description'],
                ];

                // Check if the event day matches the selected days
                if (!$this->check_event_already_exists($start, $end) && in_array($start->format('D'), $data['days'])) {
                    DB::table('events')->insert($insert_data);
                }
            }
        }

        // Return success response
        return response()->json(['redirect_url' => route('panel.events.all.index')]);
    }

    public function check_event_already_exists($start, $end)
    {
        return Event::where(function ($query) use ($start, $end) {
            $startDate = Carbon::parse($start)->format('Y-m-d');
            $endDate = Carbon::parse($end)->format('Y-m-d');
            $startTime = Carbon::parse($start)->format('H:i:s');
            $endTime = Carbon::parse($end)->format('H:i:s');

            // Ensure that the event overlaps any existing event on the same day
            $query->whereDate('e_events_date', $startDate)
                ->where(function ($q) use ($startTime, $endTime) {
                    $q->where(function ($q) use ($startTime, $endTime) {
                        $q->whereTime('e_events_from', '<=', $startTime)
                            ->whereTime('e_events_to', '>', $startTime); // Overlaps start
                    })
                        ->orWhere(function ($q) use ($startTime, $endTime) {
                            $q->whereTime('e_events_from', '<', $endTime)
                                ->whereTime('e_events_to', '>=', $endTime); // Overlaps end
                        })
                        ->orWhere(function ($q) use ($startTime, $endTime) {
                            $q->whereTime('e_events_from', '>=', $startTime)
                                ->whereTime('e_events_to', '<=', $endTime); // Fully inside the range
                        });
                });
        })->exists();
    }



// Helper function to extract minutes from the time string (e.g., '+15 minutes')


}
