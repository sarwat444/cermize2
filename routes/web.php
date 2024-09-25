<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ {
    HomeController,
    AuthController,
    ReservationController
}
;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {
        Route::group([], function () {
                Route::get( '/', [ HomeController::class, 'index' ] )->name( 'home' );
                Route::get('/events/{month}', [HomeController::class, 'getEventsByMonth'])->name('events.byMonth');
                Route::get('reservation/{id}' , [ReservationController::class , 'index'])->name('reservation');
                Route::post('send_reservation' , [ReservationController::class , 'send_reservation'])->name('send_reservation') ;
        }
        );
    }
);
