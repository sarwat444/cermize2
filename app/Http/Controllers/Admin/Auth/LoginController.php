<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin')->except('loggedOut');
    }

    protected $redirectTo = '/admin';

    public function showLoginForm() {
         return view('panel.auth.login');
    }

    public function login(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $admin = Admin::findorfail(auth('admin')->user()->id);
            return redirect()->route('panel.home');
        }
        $request->session()->flash('alert-danger', 'The entered data does not match our records.');
        return redirect()->back();
    }

    public function loggedOut(Request $request)
    {
        $this->guard()->logout();
        return redirect('/admin/login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
