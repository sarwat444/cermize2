<?php

use App\Http\Controllers\Api\AlternativeMedicineController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\BlogsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\SpecializesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' =>'changelanguage'  , 'namespace' =>'Api'],function (){

    Route::get('get/countries', [CountryController::class , 'index']);
    Route::group(['prefix'=>'users'],function (){
        Route::post('register',            [RegisterController::class , 'register']);
        Route::post('sendverficationcode', [RegisterController::class ,'SendVerificationCode']);
        Route::post('verify',              [RegisterController::class ,'verify']);
        Route::post('login',               [RegisterController::class ,'login']);
        Route::post('delete',              [RegisterController::class ,'delete']);
        Route::post('resend-verify-code',  [RegisterController::class ,'resendCode']);
        Route::post('contact_us',  [RegisterController::class ,'contact_us']);

        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('change_password',  [RegisterController::class , 'changePassword']);
            Route::get('info',        [RegisterController::class , 'user_info']);
            Route::post('update/profile',   [RegisterController::class , 'updateProfile']);
            Route::post('update/fcm_token', [RegisterController::class , 'updatefcmToken']);
            Route::get('appointments'        , [AppointmentController::class , 'userAppointments']);
            Route::get('/alternative_medicines'  , [AlternativeMedicineController::class , 'userOrders']);
            Route::get('/my/questions'            , [QuestionsController::class , 'myQuestions']);
        });

        Route::post('forgot-password',      [RegisterController::class , 'reset_password_request']);
        Route::post('verify-token',         [RegisterController::class , 'verify_token']);
        Route::post('reset-password',       [RegisterController::class , 'reset_password_submit']);

    });

    Route::get('categories/all', [CategoryController::class , 'index']);
    Route::group(['prefix'=>'specializes'] ,function () {
        Route::get('all',[SpecializesController::class , 'index']);
        Route::get('doctors/{id}' , [SpecializesController::class , 'doctors']);
    });

    Route::group(['prefix'=>'appointments' , 'middleware' => 'auth:api'] ,function (){
        Route::post('/'            , [AppointmentController::class , 'index']);
      //  Route::post('/previous'    , [AppointmentController::class , 'index']);
        Route::get('/show/{id}'    , [AppointmentController::class , 'show']);
        Route::post('store'        , [AppointmentController::class , 'store']);
        Route::post('update/{id}'  , [AppointmentController::class , 'update']);
        Route::delete('delete/{id}', [AppointmentController::class , 'destroy']);
    });

    Route::group(['prefix'=>'alternative_medicines' , 'middleware' => 'auth:api'] ,function (){
        Route::get('/show/{id}'    , [AlternativeMedicineController::class , 'show']);
        Route::post('store'        , [AlternativeMedicineController::class , 'store']);
    });

    Route::group(['prefix'=>'doctors'] ,function () {
        Route::get('/' , [DoctorsController::class , 'index']);
    });

    Route::group(['prefix'=>'questions'],function (){
        Route::post('/'            , [QuestionsController::class , 'index']);
        Route::get('/show/{id}'    , [QuestionsController::class , 'show']);
        Route::post('store'        , [QuestionsController::class , 'store'])->middleware('auth:api');
        Route::post('update/{id}'  , [QuestionsController::class , 'update'])->middleware('auth:api');
        Route::delete('delete/{id}', [QuestionsController::class , 'destroy'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'blogs'],function (){
        Route::post('/'            , [BlogsController::class , 'index']);
        Route::get('/show/{id}'    , [BlogsController::class , 'show']);
    });

    Route::group(['prefix'=>'orders' , 'middleware' => 'auth:api'],function (){
        Route::get('/all'            , [OrdersController::class , 'index']);
        Route::get('/show/{id}'      , [OrdersController::class , 'show']);
        Route::post('store'          , [OrdersController::class , 'store']);
        Route::post('update/{id}'    , [OrdersController::class , 'update']);
        Route::post('cancel/{id}'    , [OrdersController::class , 'cancel']);
    });

});
