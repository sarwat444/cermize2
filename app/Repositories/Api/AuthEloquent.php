<?php

namespace App\Repositories\Api;

use App\Mail\ResetMail;
use App\Mail\VerifyCodeMail;
use App\Models\ContactUs;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthEloquent extends HelperEloquent
{
   use ResponseJson;

   public function register($request) {

        try {
            $data             = $request->all();
            $data['password'] = bcrypt($request->password);
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            $user->sendVerificationCode();
            $data = null;
            return $this->sendResponse(trans('verfication_code_sended_successfully') , $data);

        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError( trans('something_wrong_happen') , null);
        }
   }

   public function login($request) {

       $credentials = $request->only('email_or_phone', 'password');
       if(Auth::attempt(['email' => $request->email_or_phone , 'password' => $request->password ]) || Auth::attempt(['code_country' => $request->code_country , 'mobile' => $request->email_or_phone , 'password' => $request->password ]) ){
            $user    =  Auth::user();
            if($user->is_validation ==  0) {
                return $this->sendResponse( null , __('verify_your_account_first'));
            }else{
                $user['token']  =  $user->createToken('MyApp')-> accessToken;
                return $this->sendResponse(  __('done_success') , $user);
            }
        }else {
            return $this->sendError( __('invalid_credentials') , null);
        }
    }

    public function verify($request)
    {
        $code = $request->code;

        $user = User::where('validation_code', $code)->first();
        if($user) {
            if($user->is_validation == 1){
                $user['token'] =  $user->createToken('MyApp')-> accessToken;
                return $this->sendResponse(__('done_success') , $user);
            }
            $user->email_verified_at = now();
            $user->is_validation     = 1;
            $user->save();
            $user['token']    =  $user->createToken('MyApp')-> accessToken;
            return $this->sendResponse(__('done_success') , $user);
        }else {
            return $this->sendError( __('code_wrong') , NULL);
        }
    }

    public function user_info() {
        $user             = auth()->guard('api')->user();
        if($user) {
            $user['image'] = !empty($user->image) ? url(config('constants.asset_path')) . '/' . $user->image : null;
            $success       = null;
            return $this->sendResponse($user, 'User Info.');
        }
    }

    public function updateProfile($request){

        DB::beginTransaction();
        try {

            $user = Auth::guard('api')->user();
            if($user) {
                if(!empty($request->password)) {
                    $user->password   = bcrypt($request->password);
                }
                if($request->hasFile('image')){
                    $image        = $request->file('image');
                    $file_name    = uploadImage($image, 'users/' .  $user->id .'/avatars');
                    $image_name   = $file_name;
                } else{
                    $image_name   = $user->image;
                }
                $user->first_name = $request->first_name;
                $user->last_name  = $request->last_name;
                $user->mobile     = $request->mobile;
                $user->email      = $request->email;
                $user->image      = $image_name;
                $user->save();
                $user['token']    = $user->createToken('MyApp')-> accessToken;
                $user['image']    = !empty($user->image) ? url(config('constants.asset_path')) . '/' . $user->image : null;
                $success          = null;
                DB::commit();
                return $this->sendResponse(__('done_success') , $user);
            }
        }catch (\Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }

    }

    public function changePassword($request) {
        $input = $request->all();
        $userid = Auth::guard('api')->user()->id;
        DB::beginTransaction();
        try {
            if ((Hash::check(request('old_password'), Auth::guard('api')->user()->password)) == false) {
                return $this->sendError(__('check_your_old_password') , null);
            } else if ((Hash::check(request('password'), Auth::user()->password)) == true) {
                return $this->sendError(__('please_enter_a_password_which_is_not_similar_then_current_password') , null);
            } else {
                User::where('id', $userid)->update(['password' => Hash::make($input['password'])]);
                $success    = null;
                DB::commit();
                return $this->sendResponse(__('done_success') , $success);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }

    }

    public function contact_us($request) {
        DB::beginTransaction();
        try {
            $validator = Validator::make( $request->all(), [
                'mobile'   => 'required',
                'email'    => 'required|email',
                'message'  => 'required'
            ] , [
                'mobile.required'  => __('mobile_required'),
                'email.required'   => __('email_required'),
                'message.required' => __('message_required'),
            ]);
            if ( $validator->fails() ) {
                return $this->sendError( 'Validation Error.', $validator->errors()->first() );
            }
            $contact            = new ContactUs();
            $contact->mobile    = $request->mobile ;
            $contact->email     = $request->email ;
            $contact->message   = $request->message ;
            $contact->save();
           // $adminEmail = 'noreply@mzadlive.com';
           // Mail::to( $adminEmail )->send( new ContactMail( $contact ) );
            $success    = null;
            DB::commit();
            return $this->sendResponse(__('contact_us_ms') , $success);
        } catch ( \Exception $e ) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }

    public function reset_password_request($request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ] , [
                'email.required'   => __('email_required')
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user = User::Where(['email' => $request['email']])->first();

            if (isset($user)) {

                if ((!$user->email_verified_at)) {
                    $success = null;
                    return $this->sendError(__('verify_your_account_first.') , $success);
                }else {

                    $token = "1234"; //rand(1000,9999);
                    DB::table('password_reset_tokens')->insert([
                        'email' => $user['email'],
                        'token' => $token,
                        'created_at' => now(),
                    ]);

                   // Mail::to($request['email'])->send(new ResetMail($token));
                    $success    = null;
                    DB::commit();
                    return $this->sendResponse(__('token_sent_successfully') , $success);
                }
            }else {
                return $this->sendError(__('email_not_found'), null);
            }
        }catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }

    public function verify_token($request) {

        $validator = Validator::make($request->all(), [
            'email'           => 'required',
            'reset_token'     => 'required'
        ], [
            'email.required'   => __('email_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }
        $user = User::where('email', $request->email)->first();
        if (!isset($user)) {
            return $this->sendError(__('email_not_found'), null);
        }

        $data = DB::table('password_reset_tokens')->where(['token' => $request['reset_token'],'email'=> $user->email])->first();
        if (isset($data)) {
            $success    = null;
            return $this->sendResponse(__('OTP_found_you_can_proceed') , $success);

        }
        return $this->sendError(__('invalid_token.') , null);
    }

    public function reset_password_submit($request)
    {
        $validator = Validator::make($request->all(), [
            'reset_token'        => 'required',
            'password'           => 'required|string|min:8',
            'confirm_password'   => 'required|same:password',
        ], [
            'password.required' => __('password_required'),
            'password.string'   => __('password_string'),
            'password.min'      => __('password_min', ['min' => 8]),
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $data = DB::table('password_reset_tokens')->where(['token' => $request['reset_token']])->first();
        if (isset($data)) {
            if ($request['password'] == $request['confirm_password']) {
                DB::table('users')->where(['email' => $data->email])->update([
                    'password' => bcrypt($request['confirm_password'])
                ]);
                DB::table('password_reset_tokens')->where(['token' => $request['reset_token']])->delete();
                $success    = null;
                return $this->sendResponse(__('password_changed_successfully') , $success);
            }
            return $this->sendError(__('password_did_not_match') , null);
        }
        return $this->sendError(__('invalid_otp'), null);
    }
}
