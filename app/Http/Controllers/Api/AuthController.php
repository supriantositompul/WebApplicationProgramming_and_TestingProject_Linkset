<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'error' => $validator->errors(),
                ],
                422
            );
        }

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Unauthorized',
                ],
                401
            );
        }

        $user = Auth::user();
        return response()->json([
            'status' => true,
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ]);
    }

    public function register(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'username_slug' => 'required|string|min:6',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'error' => $validator->errors(),
                ],
                401
            );
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'username_slug' => $request->username_slug,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ], 201);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => true,
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ],
        ]);
    }
}


function testData(Request $req)
{
    $rules = [
        'name' => 'required|min:2|max:225 ',
        'link' => 'required|url',
    ];
    $validator = Validator::make($req->all(), $rules);
    if ($validator->fails()) {
        return response()->json(
            [
                'type' => 'Bad Request',
                'error' => $validator->errors(),
            ],
            400
        );
    } else {
        $Links = new links();
        $Links->user_id = $req->user_id;
        $Links->name = $req->name;
        $Links->link = $req->link;
        $result = $Links->save();
        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Update was successful',
                'links' => $Links,
            ], 200);
        } else {
            return ['result' => 'Update operation has been failed'];
        }
    }
}
