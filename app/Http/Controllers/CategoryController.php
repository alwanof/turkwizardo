<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang = 'en')
    {
        if ($lang == 'en') {
            $flag = 'us';
        } elseif ($lang == 'ar') {
            $flag = 'sa';
        } else {
            $flag = 'tr';
        }
        return view('categories.index', compact(['lang', 'flag']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hash = Str::random();

        return view('categories.new', compact(['hash']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'enname' => 'required|max:190',
            'hash' => 'required',
            'arname' => 'required|max:190',
            'trname' => 'required|max:190',
            'endesc' => 'required',
            'ardesc' => 'required',
            'trdesc' => 'required',

        ]);
        $langs = ['en', 'ar', 'tr'];

        foreach ($langs as $lang) {
            $name = $lang . 'name';
            $desc = $lang . 'desc';

            if ($request->update == 0) {
                $cat = new Category;
            } else {
                $cat = Category::where([
                    'hash' => $request->hash,
                    'lang' => $lang
                ])->first();
            }

            $cat->name = $request->$name;
            $cat->hash = $request->hash;
            $cat->description = $request->$desc;
            $cat->lang = $lang;
            $cat->save();
        }

        return back()->with([
            'alert' => 'Item has been saved successfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
        $lang=App::getLocale();
        $category=Category::where([
            'lang'=>$lang,
            'hash'=>$hash
        ])->firstOrFail();
        $feeds=Feed::where('category_id',$category->id)
            ->orderBy('recommended','DESC')
            ->orderBy('views','DESC')
            ->take(20)->get();

        return view('front.category',compact(['category','feeds']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $initCategory = Category::find($id);

        if (is_object($initCategory)) {
            $enCategory = Category::where([
                'hash' => $initCategory->hash,
                'lang' => 'en'
            ])->first();
            $arCategory = Category::where([
                'hash' => $initCategory->hash,
                'lang' => 'ar'
            ])->first();
            $trCategory = Category::where([
                'hash' => $initCategory->hash,
                'lang' => 'tr'
            ])->first();
            $hash = $enCategory->hash;



            return view('categories.edit', compact(['enCategory', 'arCategory', 'trCategory', 'hash']));
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
