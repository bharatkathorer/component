<?php

namespace App\Http\Controllers;

use App\Traits\CheckPermission;
use App\Traits\ToastNotificationTrait;

abstract class Controller
{
    use ToastNotificationTrait;
    use CheckPermission;
}
