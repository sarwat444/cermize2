<?php

namespace App\Repositories\Api;

use App\Http\Resources\AlternativeMedicineResource;
use App\Http\Resources\Api\AlternativeMedicineOrderResource;
use App\Http\Resources\Api\QuestionsResource;
use App\Models\AlternativeMedicineOrder;
use App\Models\Appointment;
use App\Models\AppointmentAttachments;
use App\Models\User;
use App\Traits\ResponseJson;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlternativeMedicineEloquent extends HelperEloquent
{
   use ResponseJson;

    public function userOrders($type) {
        $user_id = $this->getUser(true)->id;
        if($type == 'current') {
            return  AlternativeMedicineOrderResource::collection(AlternativeMedicineOrder::where(['user_id' =>  $user_id])->with(['user' , 'doctor'])->orderBy('id' , 'DESC')->where('status' , 'pending')->paginate(config('constants.PAGIBNATION_COUNT')));
        }else {
            return  AlternativeMedicineOrderResource::collection(AlternativeMedicineOrder::where(['user_id' =>  $user_id])->with(['user' , 'doctor'])->orderBy('id' , 'DESC')->whereIn('status' ,['completed' , 'cancelled'])->paginate(config('constants.PAGIBNATION_COUNT')));
        }
    }

    public function show ($id) {
        $user_id = $this->getUser(true)->id;
        return  AlternativeMedicineOrderResource::collection(AlternativeMedicineOrder::where(['id' => $id , 'user_id' =>  $user_id])->with(['user' , 'doctor'])->get())->first();
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            $data                 = $request->all();
            $data['user_id']      = $this->getUser(true)->id;
            $alternative_medicine = AlternativeMedicineOrder::updateOrCreate(['id' => 0], $data);
            DB::commit();
            return $this->sendResponse(__('done_success') , $alternative_medicine);
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
   }

   public function update($id , $request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $user_id         = $this->getUser(true)->id;
            $question        = Question::where(['id' => $id , 'user_id' => $user_id])->first();
            if($question) {
                $detailsArray    = [];
                foreach(locales() as $key=>$locale) {
                    $detailsArray["details_$key"] = $data['details'];
                }
                $request->request->add($detailsArray);
                $question        = Question::updateOrCreate(['id' => $id], $data)->createTranslation($request);
                DB::commit();
                return $this->sendResponse(__('done_success') , null);
            }else {
                return $this->sendError( __('not_found') , null);
            }
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }
    public function delete($id) {
        DB::beginTransaction();
        try {
            $user_id         = $this->getUser(true)->id;
            $question        = Question::where(['id' => $id , 'user_id' => $user_id])->first();
            if($question) {
                $question->forceDelete();
                DB::commit();
                return $this->sendResponse(__('done_success') , null);
            }else {
                return $this->sendError( __('not_found') , null);
            }
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }
}
