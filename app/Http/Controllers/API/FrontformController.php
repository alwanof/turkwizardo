<?php

namespace App\Http\Controllers\API;

use App\Notifications\QueryNotiEn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class FrontformController extends Controller
{
    function forward(Request $request){
        $url=$request->url();
        $lang=session('lang');

        Notification::route('mail',$request->email)
            ->notify((new QueryNotiEn($request->all()))->locale('ar'));
        return response('success',200);
    }
}
