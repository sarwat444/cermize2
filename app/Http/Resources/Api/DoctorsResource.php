<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'phone_number' => $this->mobile,
            'city'         => $this->city,
            'image'        => (!empty($this->image)) ? url(config('constants.asset_path') .  $this->image) : $this->image,
            'doctorInfo'   => $this->whenLoaded('doctorInfo'),
            //'country'      => $this->whenLoaded('country'),
        ];
    }
}
