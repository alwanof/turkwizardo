<?php

namespace App\Http\Controllers\API;

use App\Lead;
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
        $lead=new Lead;
        $note=$request->service."<hr>".$request->note."<hr>".$request->url;
        $lead->name=$request->name;
        $lead->email=$request->email;
        $lead->phone=$request->phone;
        $lead->note=$note;
        $lead->save();
        Notification::route('mail',$request->email)
            ->notify((new QueryNotiEn($request->all()))->locale($lang));
        Notification::route('mail','support@turkwizard.com')
            ->notify(new QueryAdminNoti($request->all()));
        return response('success',200);
    }
}
