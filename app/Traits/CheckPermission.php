<?php

namespace App\Traits;

trait CheckPermission
{
    public function hasPermission($permission_name, $message = null, $isFullMessage = false):void
    {
        if (!$message) {
            $message = "You don't have permission to access this page";
        }
        if (!$isFullMessage) {
            $message = 'you dont have ' . $message . ' permission';
        }
        if (auth()->user()->cannot($permission_name)) {
            abort(403, $message);
        }
    }
}
