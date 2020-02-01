<?php

namespace App\Http\Controllers\API;

use App\Notifications\QueryAdminNoti;
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
            ->notify((new QueryNotiEn($request->all()))->locale($lang));
        Notification::route('mail','support@turkwizard.com')
            ->notify(new QueryAdminNoti($request->all()));
        return response('success',200);
    }
}
