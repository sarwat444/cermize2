<?php

namespace App\Repositories\Api;

use App\Http\Resources\Api\BlogsResource;
use App\Models\Blog;
use App\Models\User;
use App\Traits\ResponseJson;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogEloquent extends HelperEloquent
{
   use ResponseJson;

    public function allblogs() {
        return  BlogsResource::collection(Blog::with('category')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
    }

    public function categoryblogs($category_id) {
        return  BlogsResource::collection(Blog::where('category_id' , $category_id)->with('category')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
    }

    public function show($id) {
        return  BlogsResource::collection(Blog::with(['category'])
        ->where(['id' => $id])
        ->get()
        )->first();
    }

}
