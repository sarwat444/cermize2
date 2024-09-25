<?php

namespace App\Repositories\Panel;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Panel\Exception;
use DataTables;
use Illuminate\Support\Facades\DB;

class BlogEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $blogs = Blog::select('*')
            ->with([
                'category',
            ])
            ->get();
        return DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('title', function ($blog) {
                return $blog->title;
            })->addColumn('details', function ($blog) {
                return $blog->details;
            })->addColumn('added by', function ($blog) {
                return $blog->added_by;
            })->addColumn('created at', function ($blog) {
                return date('d.m.y H:i', strtotime($blog->created_at));
            })->addColumn('action', function ($blog) {
                return view('panel.blogs.partials.actions', compact('blog'))->render();
            })->rawColumns(['action'])
            ->make(true);
    }

    public function show($id) {
        return Blog::findOrFail($id);
    }

    /*public function create(): array
    {
        $data['categories'] = Category::where('active',1)->get();
        return $data;
    }*/
    public function store($request) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $detailsArray = [];
            $detailsArray["details_en"] = $data['en'];
            $detailsArray["details_ar"] = $data['ar'];
            $detailsArray["details_fr"] = $data['fr'];
            $request->request->add($detailsArray);
            Blog::updateOrCreate(['id' => 0], $data)->createTranslation($request);
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

    public function edit($id)
    {
        $data['categories'] = Category::where('active',1)->get();
        $data['item'] = Blog::where('id', $id)->with(['category'])->first();
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
            $detailsArray = [];
            $detailsArray["details_en"] = $data['en'];
            $detailsArray["details_ar"] = $data['ar'];
            $detailsArray["details_fr"] = $data['fr'];
            $request->request->add($detailsArray);
            $blog = Blog::updateOrCreate(['id' => $id], $data)->createTranslation($request);
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
            $message = $e->getMessage();
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
        $blog = Blog::find($id);
        $blog->delete();

        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }

}
