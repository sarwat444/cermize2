<?php

namespace App\Repositories\Panel;
use Exception;

class HelperEloquent
{
    public function getUser($is_admin)
    {
        if ($is_admin) {
            $user = auth()->guard('admin')->user();
        } else {
            $user = auth()->user();
        }
        return $user;
    }
}
