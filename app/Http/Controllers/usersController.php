<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class usersController extends Controller
{
    function listUsers()
    {
        return users::all();
    }
    public function get(Request $request)
    {
        return response()->json([
            'status' => true,
            'user' => $request->user(),
        ]);
    }
}
