<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\winners\StoreRequest;
use App\Models\Category;
use App\Repositories\Panel\WinnerEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $winner;
    public function __construct(WinnerEloquent $winnerEloquent)
    {
        $this->winner = $winnerEloquent;
    }

    public function index()
    {
        return view('panel.winners.index');
    }

    public function getDataTable()
    {
        return $this->winner->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->winner->create();
        return view('panel.winners.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->winner->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $winner = $this->winner->show($id);
        return view('panel.winners.show', compact('winner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->winner->edit($id);
        return view('panel.winners.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $response = $this->winner->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }
    public function changeStatus($id)
    {
        $response = $this->winner->changeStatus($id);
        return $this->response_api($response['status'], $response['message']);
    }


}
