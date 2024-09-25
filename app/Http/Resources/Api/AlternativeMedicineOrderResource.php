<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlternativeMedicineOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'doctor_id' => $this->doctor_id,
            'booking_date' => $this->booking_date,
            'booking_time' => $this->booking_time,
            'payment_status' => $this->payment_status,
            'meeting_link' => $this->meeting_link,
            'payment_amount' => $this->payment_amount,
            'cancelled'  => $this->cancelled,
            'created_at' => date('d/m/Y' , strtotime($this->created_at)),
            'user'       => $this->whenLoaded('user'), // Assuming you have a UserResource for the user
            'doctor'     => $this->whenLoaded('doctor'), // Assuming you have a DoctorResource for the doctor
            'attachment_path' => url(config('constants.asset_path')) . '/'
        ];
    }
}
