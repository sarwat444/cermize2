<?php

namespace App\Repositories\Panel;

use App\Http\Resources\Api\QuestionsResource;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
class CategoryEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $data = Category::select('id' ,'active')
                        ->with('translations:category_id,name,locale')
                        ->orderByDesc('created_at')->get();
        return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'panel.categories.partials.actions')
                        ->rawColumns(['action'])
                        ->make(true);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            Category::updateOrCreate(['id' => 0], $data)->createTranslation($request);
            if (!isset($data['active'])) {
                $data['active'] = 0;
            }
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
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
        $data['item'] = Category::where('id', $id)->first();
        if ($data['item'] == '') {
            abort(404);
        }
        return $data;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['active'])) {
                $data['active'] = 0;
            }
            Category::updateOrCreate(['id' => $id], $data)->createTranslation($request);
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
        $item = Category::find($id);
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

    public function operation($request)
    {
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
