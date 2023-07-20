<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class registerApi extends Controller
{
    function getData()
    {
        return [
            'id' => '1',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'username_slug' => 'user',
            'password' => 'user1234',
            'background_color' => '#cc2424',
            'text_color' => '#000000',
            'remember_token' => 'null',
            'created_at' => '2022-11-04 14:51:06',
            'updated_at' => '2022-11-04 14:54:26',
        ];
    }
}
