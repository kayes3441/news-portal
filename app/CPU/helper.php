<?php

namespace App\CPU;

use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function module_permission_check($module_name)
    {
        $user_role = auth('admins')->user()->role;
        $permission = $user_role->module_access;
        if (isset($permission) && $user_role->status == 1 && in_array($module_name, (array)json_decode($permission)) == true) {
            return true;
        }
        if (auth('admins')->user()->admin_role_id == 1) {
            return true;
        }
        return false;
    }
}
