<?php

namespace App\Repositories\Panel;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Country;
use App\Models\event;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class eventEloquent extends HelperEloquent
{
    public function getDataTable()
    {
        $data = event::select('*')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'panel.events.partials.actions')
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            // Convert date from '02.09.2024' to '2024-09-02'
            if (isset($data['e_events_date'])) {
                $data['e_events_date'] = Carbon::createFromFormat('d.m.Y', $data['e_events_date'])->format('Y-m-d');
            }

            // For testing purposes, dump the transformed data

            if (!isset($data['active'])) {
                $data['active'] = 0;
            }
            // Save event data
            Event::updateOrCreate(['id' => 0], $data);

            $message = __('message_done');
            $status = true;
            DB::commit();
        } catch (\Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
            dd($e);
        }

        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }

    public function edit($id)
    {
        $data['item'] = event::where('id', $id)->first();
        if ($data['item'] == '') {
            abort(404);
        }
        return $data;
    }

    public function update($id, $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->all();
            if (isset($data['e_events_date'])) {
                $data['e_events_date'] = Carbon::createFromFormat('d.m.Y', $data['e_events_date'])->format('Y-m-d');
            }
             event::updateOrCreate(['id' => $id], $data);
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
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

    public function delete($id)
    {
        $item = event::find($id);
        if ($item) {
            $item->delete();
            $message =__('delete_done');
            $status = true;
            $response = [
                'message' => $message,
                'status' => $status,
            ];
            return $response;
        }
        $message = __('message_error');
        $status = false;

        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }



}
