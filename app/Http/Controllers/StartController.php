<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feed;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StartController extends Controller
{
    public function index()
    {
        $lang = session('lang');
        $sections = Section::where('lang', $lang)->get();
        $recos = Feed::where('lang', $lang)->orderBy('recommended', 'desc')->take(8)->get();
        $pops = Feed::where('lang', $lang)->orderBy('views', 'desc')->take(6)->get();
        $categories = Category::where('lang', $lang)->get();

        return view('front.home', compact(['sections', 'recos', 'pops','categories']));
    }

    public function search(Request $request){
        $keywords=isset($request->keywords)?$request->keywords:'';
        $feeds = Feed::Where('name', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('description', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('tags', 'LIKE', '%' . $request->keywords . '%')
            ->with('category')
            ->orderBy('rate','DESC')
            ->orderBy('recommended','DESC')
            ->orderBy('views','DESC')
            ->paginate(50);

        return view('front.searchresult',compact(['feeds','keywords']));
    }
}