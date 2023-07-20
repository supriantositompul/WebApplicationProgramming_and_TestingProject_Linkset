<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class password_resetsController extends Controller
{
    //
    function listPassword_resets()
    {
        return password_resets::all();
    }
}
