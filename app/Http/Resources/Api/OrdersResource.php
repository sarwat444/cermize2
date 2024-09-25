<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'user_id'      => $this->user_id,
            'order'        => $this->order,
            'country'      => $this->whenLoaded('country'),
            'city'         => $this->city,
            'plz_code'     => $this->plz_code,
            'street'       => $this->street,
            'whats_number' => $this->whats_number,
            'cancelled'    => $this->cancelled,
            'created_at'   => date('d-m-Y h:i A' , strtotime($this->created_at)),
            'attachment_path' => url(config('constants.asset_path')) . '/'
        ];
    }
}
