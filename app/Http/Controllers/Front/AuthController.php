<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Http\Requests\Front\Auth\UpdateUserDataRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /* User Login */
    public function login()
    {
        return view('front.Auth.login');
    }

    public function userLogin(LoginRequest $userLogin)
    {

        try {
            if (Auth::attempt(['email' => $userLogin->email, 'password' => $userLogin->password])) {
                // Return success response
                return response()->json(['message' => 'Login Successful'], 200);
            } else {
                // Return authentication failure response
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (\Exception $e) {
            // Handle other exceptions, such as database errors
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    /* User Register */
    public function register()
    {
        return view('front.Auth.register' );
    }


    /* Create New User */
    public function storeUser(RegisterRequest $storeUserRequest)
    {
        try {
            // Create a new user instance with the validated data
            $data =  $storeUserRequest->all() ;
            if($data['gender'] == 0 )
            {
                $data['gender'] =  'male' ;
            }else{
                $data['gender'] =  'female' ;
            }
            $user = new User([
                'first_name' => $storeUserRequest->input('first_name'),
                'last_name' => $storeUserRequest->input('last_name'),
                'email' => $storeUserRequest->input('email'),
                'mobile' => $storeUserRequest->input('mobile'),
                'password' => Hash::make($storeUserRequest->input('password')),
                'gender' => $data['gender'],
                "government" => $storeUserRequest->input('government'),
                "pharmacy_name" => $storeUserRequest->input('pharmacy_name'),
            ]);

            if(isset($data['file'])){
                $user->file = uploadImage($data['file'], 'users_files');
            }
            // Save the user to the database
            $user->save();
            // Return success response
            return response()->json(['message' => 'User registered successfully'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home') ;
    }

    public  function edit_profile()
    {
        $lang = App::getLocale();
        $countries = Country::where('status', 1)->select('id', 'phone_code' , 'name_' . $lang . ' as name')->get();
        $user = User::where('id' , Auth::user()->id)->first() ;
        return view('front.Auth.edit_profile' , compact('user' , 'countries')) ;
    }
    public function updateUser(UpdateUserDataRequest $request)
    {
        try {
            // Retrieve the authenticated user
            $user = auth()->user();
            // Update the user's profile with the validated data
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => $request->has('password') ? Hash::make($request->input('password')) : $user->password, // Hash the password if it's provided
                'city' => $request->input('state'),
                'country_id' => $request->input('country_id'),
                'mobile' => $request->input('mobile'),
                'plz_code' => $request->input('plz_code'),
                'street' => $request->input('street'),
                'gender' => $request->input('gender'),
                'code_country' => $request->input('code_country')
            ]);

            // Return a success response
            return response()->json(['message' => 'Updated Successfully']);
        } catch (\Exception $e) {
            // Return an error response if any exception occurs
            return response()->json(['message' => 'Something Went Wrong'], 500);
        }
    }
}
