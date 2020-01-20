<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontformController extends Controller
{
    function forward(Request $request){
        return $request->all();
    }
}
