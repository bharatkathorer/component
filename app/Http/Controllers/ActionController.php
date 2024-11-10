<?php

namespace App\Http\Controllers;

class ActionController extends Controller
{
    public function handleActions()
    {
        abort(403, 'handleActions method not define your controller.');
//        dd('handleActions method not define your  found.', request()->all());
    }
}
