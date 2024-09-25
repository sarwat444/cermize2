<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Resverations\StoreRequest;
use App\Models\event;
use App\Repositories\Panel\eventEloquent;
use App\Repositories\Panel\ResverationEloquent;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use App\Models\Reservation ;
use DataTables;
use DB ;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $Resveration;
    public function __construct(ResverationEloquent $ResverationEloquent)
    {
        $this->Resveration = $ResverationEloquent;
    }

    public function index(Reservation $reservation)
    {
        return view('panel.Resverations.index');
    }


    public function getDataTable()
    {

        return $this->Resveration->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->Resveration->create();
        return view('panel.Resverations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->Resveration->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Resveration = $this->Resveration->show($id);
        return view('panel.Resverations.show', compact('Resveration'));
    }
    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation) {
            $reservation->delete();
            $response['status'] = 'success';
            $response['message'] = 'Reservierung erfolgreich gelöscht.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Reservation not found.';
        }

        return $this->response_api($response['status'], $response['message']);
    }
    public function get_data($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        return response()->json(['reservation' => $reservation]);
    }

}
