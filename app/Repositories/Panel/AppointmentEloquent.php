<?php

namespace App\Repositories\Panel;

use App\Http\Resources\Api\QuestionsResource;
use App\Models\Appointment;
use App\Models\AppointmentAttachments;
use App\Models\Specialize;
use App\Models\User;
use App\Models\UserMeeting;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AppointmentEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $appointments = Appointment::select('*')
            ->with([
                'patient:id,first_name,last_name',
                'doctor:id,first_name,last_name',
                'specialize:id,icon',
                'doctor.doctorInfo.specializeion'
            ])->get();
        return DataTables::of($appointments)
            ->addIndexColumn()
            ->addColumn('patient', function ($appointment) {
                return $appointment->patient->first_name . ' ' . $appointment->patient->last_name;
            })->addColumn('doctor', function ($appointment) {
                return $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name;
            })->addColumn('specialize', function ($appointment) {
                return $appointment->doctor->doctorInfo?->specializeion->name;
            })->addColumn('urgent', function ($appointment) {
                return view('panel.appointments.partials.urgent', compact('appointment'))->render();
            })->addColumn('appointment_status', function ($appointment) {
                return view('panel.appointments.partials.appointment_status', compact('appointment'))->render();
            })->addColumn('active', function ($appointment) {
                return view('panel.appointments.partials.active', compact('appointment'))->render();
            })->addColumn('created at', function ($appointment) {
                return date('d.m.y H:i', strtotime($appointment->created_at));
            })->addColumn('action', function ($appointment) {
                return view('panel.appointments.partials.actions', compact('appointment'))->render();
            })->rawColumns(['action', 'specialize','appointment_status' ,  'urgent', 'active'])
            ->make(true);
    }

    public function show($id) {
        return Appointment::with(['patient', 'doctor.doctorInfo.specializeion', 'specialize', 'attachments'])->findOrFail($id);
    }

    public function getAllAppointments(): \Illuminate\Database\Eloquent\Collection
    {
        return Appointment::all();
    }

    public function create(): array
    {
        $data['doctors'] = User::select('*')->where('user_type', 'doctor')->get();
        $data['specializes'] = Specialize::where('active',1)->get();
        return $data;
    }
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

    public function createMeeting($request)
    {
        DB::beginTransaction();
        try {
            $appointment_id = $request->get('id');
            $appointment    = Appointment::find($appointment_id);
            $name           = 'agora'.time().rand(1111 , 9999);
            $meetingData    = createAgoraProject($name);
           dd($meetingData);
            if(isset($meetingData->project->id)) {
                $meeting           = new UserMeeting();
                $meeting->user_id  = 4;
                $meeting->app_id   = $meetingData->project->sign_key;
                $meeting->appCertificate  = $meetingData->project->vendor_key;
                $meeting->channel  = $meetingData->project->name;
                $meeting->uid      = rand(1111,9999);
                $meeting->save();
                if( $meeting) {
                    $token  = createToken($meeting->app_id , $meeting->appCertificate ,  $meeting->channel);
                    $meeting->token = $token ;
                    $meeting->url   = generateRandomString();
                    $meeting->event = generateRandomString(5);
                    $meeting->save();
                    $appointment->meeting_id  =  $meeting->id;
                    $appointment->save();
                    $message = __('message_done');
                    $status = true;
                    if(auth()->user() && auth()->user()->id == $meeting->user_id) {
                          Session::put('meeting' , $meeting->url);
                    }
                    // return redirect('joinMeeting/'.$meeting->url);
                    DB::commit();
                }
            }else {
                $message = __('message_error');
                $status = false;
            }
        }catch (\Exception $e) {
            dd($e);
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

    public function changeStatus($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment->status == 'cancelled'){

            $appointment->status = 'pending';
        }else{
            $appointment->status = 'cancelled';
        }
        $appointment->save();

        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }

}
