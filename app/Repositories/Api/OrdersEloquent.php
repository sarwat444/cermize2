<?php

namespace App\Repositories\Api;

use App\Http\Resources\Api\OrdersResource;
use App\Models\Order;
use App\Models\Question;
use App\Models\User;
use App\Traits\ResponseJson;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersEloquent extends HelperEloquent
{
   use ResponseJson;

   public function myOrders($type) {
        $user_id    = @$this->getUser(true)->id;
        if($type == 'current') {
           return  OrdersResource::collection(Order::where(['user_id' =>  $user_id])->with('country:id,name_'.App::getLocale().' as name')->where('status' , 'pending')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
        }else {
            return  OrdersResource::collection(Order::where(['user_id' =>  $user_id])->with('country:id,name_'.App::getLocale().' as name')->whereIn('status' ,['completed' , 'cancelled'])->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
        }
    }

   public function show($id) {
    $user_id    = @$this->getUser(true)->id;
    return  OrdersResource::collection(Order::where(['id' => $id , 'user_id' =>  $user_id])->with('country:id,name_'.App::getLocale().' as name')->orderBy('id' , 'DESC')->get())->first();
}
   public function store($request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $data['user_id'] = $this->getUser(true)->id;
            $order           = Order::updateOrCreate(['id' => 0], $data);
            DB::commit();
            return $this->sendResponse(__('done_success') , $order);
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
            $order           = Order::where(['id' => $id ])->first();
            if($order) {
                $question    = Order::updateOrCreate(['id' => $id], $data);
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

    public function cancel($id) {
        DB::beginTransaction();
        try {
            $user_id         = $this->getUser(true)->id;
            $order           = Order::where(['id' => $id ])->first();
            if($order) {
                $order->cancel = 1;
                $order->save();
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
