<?php

namespace App\Repositories\Api;

use App\Http\Resources\Api\AppointmentResource;
use App\Http\Resources\Api\QuestionsResource;
use App\Models\Appointment;
use App\Models\AppointmentAttachments;
use App\Models\User;
use App\Traits\ResponseJson;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentEloquent extends HelperEloquent
{
   use ResponseJson;
   public function store($request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $data['user_id'] = $this->getUser(true)->id;
            $appointment     = Appointment::updateOrCreate(['id' => 0], $data);
            if($appointment) {
                $appointment_attach                    = new AppointmentAttachments();
                $appointment_attach->appointment_id    = $appointment->id;
                if($request->file('voice')) {
                    $voice          = $request->file('voice');
                    $file_name      = uploadFile($voice , 'appointments/' .  $appointment->id .'/audio');
                    $data['voice']  = $file_name;
                    $appointment_attach->voice = $data['voice'];
                }

                if($request->file('medications_voice')) {
                    $medications_voice         = $request->file('medications_voice');
                    $file_name                 = uploadFile($medications_voice, 'appointments/' .  $appointment->id .'/audio');
                    $data['medications_voice'] = $file_name;
                    $appointment_attach->medications_voice = $data['medications_voice'];
                }

                if($request->file('compliant_voice')) {
                    $compliant_voice           = $request->file('compliant_voice');
                    $file_name                 = uploadFile($compliant_voice, 'appointments/' .  $appointment->id .'/audio');
                    $data['compliant_voice']   = $file_name;
                    $appointment_attach->compliant_voice   = $data['compliant_voice'];
                }

                if($request->file('x_rays_images')) {
                    $images1           = $request->file('x_rays_images');
                    $file_name         = uploadappointmentReports($images1, 'appointments/' .  $appointment->id .'/reports');
                    $data['x_rays_images']         = $file_name;
                    $appointment_attach->x_rays_images   = $data['x_rays_images'];
                }

                if($request->file('cd_reports_images')) {
                    $images            = $request->file('cd_reports_images');
                    $file_name         = uploadappointmentReports($images, 'appointments/' .  $appointment->id .'/reports');
                    $data['cd_reports_images']     = $file_name;
                    $appointment_attach->cd_reports_images   = $data['cd_reports_images'];
                }

                if($request->file('radio_graphs_images')) {
                    $images            = $request->file('radio_graphs_images');
                    $file_name         = uploadappointmentReports($images, 'appointments/' .  $appointment->id .'/reports');
                    $data['radio_graphs_images']     = $file_name;
                    $appointment_attach->radio_graphs_images   = $data['radio_graphs_images'];
                }

                if($request->file('test_medical_attachment')) {
                    $attachment         = $request->file('test_medical_attachment');
                    $file_name          = uploadappointmentReports($attachment, 'appointments/' .  $appointment->id .'/reports');
                    $data['test_medical_attachment'] = $file_name;
                    $appointment_attach->test_medical_attachment   = $data['test_medical_attachment'];
                }

                if($request->file('medications_images')) {
                    $attachment2         = $request->file('medications_images');
                    $file_name          = uploadappointmentReports($attachment2, 'appointments/' .  $appointment->id .'/reports');
                    $data['medications_images'] = $file_name;
                    $appointment_attach->medications_images   = $data['medications_images'];
                }

                if($request->file('regularly_medications_image')) {
                    $attachment3         = $request->file('regularly_medications_image');
                    $file_name          = uploadImage($attachment3, 'appointments/' .  $appointment->id .'/reports');
                    $data['regularly_medications_image'] = $file_name;
                    $appointment_attach->regularly_medications_image   = $data['regularly_medications_image'];
                }

                if($request->file('cd_reports_video')) {
                    $cd_reports_video           = $request->file('cd_reports_video');
                    $file_name                 = uploadFile($cd_reports_video, 'appointments/' .  $appointment->id .'/audio');
                    $data['cd_reports_video']   = $file_name;
                    $appointment_attach->cd_reports_video   = $data['cd_reports_video'];
                }



                $appointment_attach->save();
            }
            DB::commit();
            return $this->sendResponse(__('done_success') , null);
        }catch(Exception $e) {
            DB::rollback();
            dd($e);
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

    public function show ($id) {
        $user_id = $this->getUser(true)->id;
        return  AppointmentResource::collection(Appointment::where(['id' => $id , 'user_id' =>  $user_id])->with(['attachments' , 'doctor' , 'specialize' , 'meeting_info'])->get())->first();
    }
    public function userAppointments($type) {
        $user_id = $this->getUser(true)->id;
        if($type == 'current') {
           return  AppointmentResource::collection(Appointment::where(['user_id' =>  $user_id])->with('attachments', 'doctor' , 'specialize' , 'meeting_info')->orderBy('id' , 'DESC')->where('status' , 'pending')->paginate(config('constants.PAGIBNATION_COUNT')));
        } else {
            return  AppointmentResource::collection(Appointment::where(['user_id' =>  $user_id])->with('attachments', 'doctor' , 'specialize' , 'meeting_info')->orderBy('id' , 'DESC')->whereIn('status' ,['completed' , 'cancelled'])->paginate(config('constants.PAGIBNATION_COUNT')));
        }
    }
}
