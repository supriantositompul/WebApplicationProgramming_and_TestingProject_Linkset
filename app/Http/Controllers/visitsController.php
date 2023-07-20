<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visits;

class visitsController extends Controller
{
    function listVisits()
    {
        return visits::all();
    }
}
