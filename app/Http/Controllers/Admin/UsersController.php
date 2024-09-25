<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\users\StoreRequest;
use App\Models\Reservation;
use App\Repositories\Panel\UserEloquent;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $user;
    public function __construct(UserEloquent $UserEloquent)
    {
        $this->user = $UserEloquent;
    }

    public function index()
    {
        return view('panel.users.index');
    }

    public function getDataTable()
    {
        return $this->user->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->user->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user  = $this->user->show($id);
        $reservations = Reservation::where('r_reservations_email' , $user->email)->get() ;
        return view('panel.users.show', compact('user' , 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->user->show($id);
        return view('panel.users.create' , compact('item'));
    }
    public function update(StoreRequest $request , string $id)
    {
        $response = $this->user->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }
    public function destroy(string $id)
    {
        //
    }
}
