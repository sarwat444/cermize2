<?php

namespace App\Repositories\Panel;
use Composer\EventDispatcher\Event;
use App\Models\{Reservation};
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ResverationEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $query = Reservation::with('event')->select('reservations.*')->orderBy('id', 'desc');

        // Fetch and return the data for DataTables
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('e_event_name', function ($reservation) {
                return $reservation->event->e_events_name ;
            })
            ->addColumn('r_reservations_username', function ($reservation) {
                return $reservation->r_reservations_username;
            })
            ->addColumn('r_reservations_email', function ($reservation) {
                return $reservation->r_reservations_email;
            })
            ->addColumn('r_reservations_phone', function ($reservation) {
                return $reservation->r_reservations_phone;
            })
            ->addColumn('r_reservations_seats', function ($reservation) {
                return $reservation->r_reservations_seats;
            })
            ->addColumn('created_at', function ($reservation) {
                return date('d.m.y H:i', strtotime($reservation->created_at));
            })
            ->addColumn('action', function ($reservation) {
                return view('panel.Resverations.partials.actions', compact('reservation'))->render();
            })
            ->rawColumns(['r_reservations_username', 'r_reservations_email', 'r_reservations_phone', 'r_reservations_seats' ,'action'])
            ->make(true);
    }

    public function create(): array
    {
        $lang = App::getLocale();
        $data['countries'] = Country::where('status',1)->select('id','name_'.$lang.' as name', 'phone_code')->voteBy('name')->get();
        return $data;
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $reservation = Reservation::updateOrCreate(['id' => 0], $data);
            DB::commit();
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch(Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
        }
        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }

}
