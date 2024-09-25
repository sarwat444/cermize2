<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'category_id'   => $this->category_id,
            'details'       =>    $value = str_replace('<p>', '', str_replace('</p>', '', str_replace('&nbsp;', '', str_replace('\r\n', ' ', $this->details)) )),
            'category_name' => @$this->category->name,
            'answers'       => $this->whenLoaded('answers'),
            'created_at'    => date('d/m/Y' , strtotime($this->created_at))
        ];
    }
}
