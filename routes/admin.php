<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\{
    WinnerController,
    HomeController,
    ReservationController,
    UsersController,
    eventsController
};

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [LoginController::class, 'loggedOut'])->name('admin.logout');

Route::group(['middleware' => 'auth:admin'],function () {
    Route::get('/', [HomeController::class,'index'])->name('home');



    Route::group(['prefix' => 'events', 'as' => 'events.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [eventsController::class, 'create'])->name('index');
            Route::post('/', [eventsController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [eventsController::class, 'edit'])->name('index');
            Route::post('/{id}' , [eventsController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [eventsController::class, 'index'])->name('index');
            Route::get('/data'  , [eventsController::class, 'getDataTable'])->name('data');
        });

        Route::delete('/{id}'   , [eventsController::class, 'delete'])->name('delete');
        Route::post('/operation', [eventsController::class, 'operation'])->name('operation');
        Route::get('view_events/{id}' , [eventsController::class, 'show'])->name('view_events');
        Route::get('/view_events/get-seats/{group}/{event_id}', [eventsController::class, 'getSeats'])->name('get_seats');
        Route::post('/change_seat_postition' , [eventsController::class, 'change_seat_postition'])->name('change_seat_postition') ;
        Route::post('/add-multiple-user-event', [eventsController::class, 'addMultipleUserEvent'])->name('addMultipleUserEvent');
        Route::get('/create-multiple-user-event', [eventsController::class, 'createMultipleUserEvent'])->name('createMultipleUserEvent');
    });






    Route::group(['prefix' => 'Resverations', 'as' => 'Resverations.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [ReservationController::class, 'create'])->name('index');
            Route::post('/', [ReservationController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [ReservationController::class, 'edit'])->name('index');
            Route::post('/{id}' , [ReservationController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [ReservationController::class, 'index'])->name('index');
            Route::get('/data'  , [ReservationController::class, 'getDataTable'])->name('data');
        });
        Route::get('get_data/{id}' ,[ReservationController::class, 'get_data'])->name('get_data');
    });


    Route::group(['prefix' => 'users', 'as' => 'users.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [UsersController::class, 'create'])->name('index');
            Route::post('/', [UsersController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [UsersController::class, 'edit'])->name('index');
            Route::post('/{id}' , [UsersController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [UsersController::class, 'index'])->name('index');
            Route::get('/data'  , [UsersController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [UsersController::class, 'show'])->name('show');
    });



    Route::group(['prefix' => 'Resverations', 'as' => 'Resverations.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [ReservationController::class, 'create'])->name('index');
            Route::post('/', [ReservationController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [ReservationController::class, 'edit'])->name('index');
            Route::post('/{id}' , [ReservationController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [ReservationController::class, 'index'])->name('index');
            Route::get('/data'  , [ReservationController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [ReservationController::class, 'show'])->name('show');
        Route::get('changeStatus/{id}'   , [ReservationController::class, 'changeStatus'])->name('changeStatus');
        Route::delete('/{id}'   , [ReservationController::class, 'destroy'])->name('delete');
    });




});

