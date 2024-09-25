<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'specialize_id' => $this->specialize_id,
            'message' => $this->message,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'breastfeeding_status' => $this->breastfeeding_status,
            'age' => $this->age,
            'height' => $this->height,
            'weight' => $this->weight,
            'country' => $this->country,
            'nationality' => $this->nationality,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'work' => $this->work,
            'is_smoker' => $this->is_smoker,
            'drink_alcohol' => $this->drink_alcohol,
            'medications_allergy' => $this->medications_allergy,
            'allergy_medications_names' => $this->allergy_medications_names,
            'had_surgeries' => $this->had_surgeries,
            'surgeries_names' => $this->surgeries_names,
            'had_hereditary_diseases' => $this->had_hereditary_diseases,
            'hereditary_diseases_names' => $this->hereditary_diseases_names,
            'take_medications_regularly' => $this->take_medications_regularly,
            'compliant' => $this->compliant,
            'taking_medications' => $this->taking_medications,
            'urgent'          => $this->urgent,
            'created_at'      => date('d/m/Y' , strtotime($this->created_at)),
            'updated_at'      => $this->updated_at,
            'specialize'      =>  $this->whenLoaded('specialize'),
            'doctor'          =>  $this->whenLoaded('doctor'),
            'patient'         =>  $this->whenLoaded('patient'),
            'attachments'     =>  $this->whenLoaded('attachments'),
            'meeting_info'    => $this->whenLoaded('meeting_info'),
            'attachment_path' => url(config('constants.asset_path')) . '/'
        ];
    }
}
