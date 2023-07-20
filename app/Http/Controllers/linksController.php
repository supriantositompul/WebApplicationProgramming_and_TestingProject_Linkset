<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\links;

class linksController extends Controller
{
    function ReadLinks()
    {
        return links::all();
    }
}
