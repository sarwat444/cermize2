<?php

namespace App\Repositories\Panel;

use App\Models\AlternativeMedicineOrder;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
class AlternativeMedicineEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $data   = AlternativeMedicineOrder::select('*')->orderByDesc('created_at')->get();
        return  DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('user', function ($order) {
                                return $order->user->first_name . ' ' . $order->user->last_name;
                            })
                            ->addColumn('doctor', function ($order) {
                                return $order->doctor->first_name . ' ' . $order->doctor->last_name;
                            })->addColumn('doctor', function ($doctor) {
                                return view('panel.alternative_medicine.partials.doctor', compact('doctor'))->render();
                            })
                            ->rawColumns(['doctor'])
                            ->make(true);
    }

    public function operation($request) {
        $id = $request->get('id');
        $item = Category::find($id);
        if ($item) {
            $item->active = !$item->active;
            $item->update();
            $message = __('message_done');
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
