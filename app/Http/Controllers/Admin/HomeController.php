<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,Winner , event,Reservation};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $users  = User::count() ;
        $events = event::count() ;
        $reservation = Reservation::count() ;

        $data = [
            'users' => $users ,
            'events' => $events ,
            'reservation' => $reservation
        ];

        return view('panel.home',$data);
    }
}
