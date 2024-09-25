<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id ,
            'category_id ' => $this->category_id  ,
            'image'        => (!empty($this->image)) ? url(config('constants.asset_path') .'uploads/blogs/'.  $this->image) :  $this->image,
            'title'        => $this->title ,
            'details'      => $this->details ,
            'created_at'   => date('d-m-Y h:i A' , strtotime($this->created_at)),
            'category'     => $this->whenLoaded('category')
        ];
    }
}
