<?php

namespace App\Repositories\Api;
use Exception;

class HelperEloquent
{
    public function getUser($is_api)
    {
        if ($is_api) {
            $user = auth()->guard('api')->user();
        } else {
            $user = auth()->user();
        }
        return $user;
    }
}
