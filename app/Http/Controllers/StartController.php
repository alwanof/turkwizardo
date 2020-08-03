<?php

namespace App\Http\Controllers;

use App\Category;
use App\Demand;
use App\Feed;
use App\Section;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{
    public function index()
    {
        $lang = session('lang');
        $sections = Section::where('lang', $lang)->get();
        //$recos = Feed::where('lang', $lang)->orderBy('recommended', 'desc')->take(8)->get();
        //$pops = Feed::where('lang', $lang)->orderBy('views', 'desc')->take(6)->get();
        $categories = Category::where('lang', $lang)->get();
        $cities =  DB::table('feeds')
            ->select('city')
            ->where('lang', $lang)
            ->groupBy('city')
            ->get();

        //$demands=Demand::where('category_id','!=',0)->where('status',1)->latest()->take(3)->get();

        return view('front.home', compact(['sections', 'categories', 'cities']));
    }





    public function search(Request $request)
    {

        $lang = session('lang');
        $keywords = isset($request->keywords) ? $request->keywords : '';
        $category_id = isset($request->category_id) ? $request->category_id : 0;
        $city = isset($request->city) ? $request->city : '0';
        $categories = Category::where('lang', $lang)->get();
        $cities =  DB::table('feeds')
            ->select('city')
            ->where('lang', $lang)
            ->groupBy('city')
            ->get();

        return view('front.searchresult', compact(['keywords', 'category_id', 'city', 'categories', 'cities']));
    }
}