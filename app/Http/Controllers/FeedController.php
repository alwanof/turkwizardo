<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feed;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class FeedController extends Controller
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
        return view('feeds.index', compact(['lang', 'flag']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hash = Str::random();
        $categories = Category::where('lang', 'en')->get();
        $tagsEn = Tag::where('lang', 'en')->get();
        $tagsAr = Tag::where('lang', 'ar')->get();
        $tagsTr = Tag::where('lang', 'tr')->get();

        return view('feeds.new', compact(['hash', 'categories', 'tagsEn', 'tagsAr', 'tagsTr']));
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
            'enslug' => 'required|max:190',
            'arslug' => 'required|max:190',
            'trslug' => 'required|max:190',
            'endesc' => 'required',
            'ardesc' => 'required',
            'trdesc' => 'required',
            'entags' => 'required',
            'artags' => 'required',
            'trtags' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'required',
            'category' => 'required',
            'rate' => 'required|min:0|max:25',

        ]);
        $langs = ['en', 'ar', 'tr'];
        $citykey = array_search($request->city, Config::get('cities.en'));

        foreach ($langs as $lang) {
            $name = $lang . 'name';
            $slug= $lang . 'slug';
            $desc = $lang . 'desc';
            $city = Config::get('cities.' . $lang)[$citykey];
            $tags = $lang . 'tags';

            $category = ($lang == 'en') ? $request->category : Category::where([
                'hash' => Category::find($request->category)->hash,
                'lang' => $lang

            ])->first()->id;
            if ($request->update == 0) {
                $feed = new Feed;
            } else {
                $feed = Feed::where([
                    'hash' => $request->hash,
                    'lang' => $lang
                ])->first();
            }

            $feed->name = $request->$name;
            $feed->hash = $request->hash;
            $feed->slug = ($lang=='ar')?$this->slug($request->$slug):Str::slug($request->$slug);
            $feed->description = $request->$desc;
            $feed->phone = $request->phone;
            $feed->email  = $request->email;
            $feed->city = $city;
            $feed->website = $request->website;
            $feed->tags = implode(',', $request->$tags); //here
            $feed->rate = $request->rate;
            $feed->recommended = (isset($request->reco)) ? $request->reco : 0;
            $feed->lang = $lang;
            $feed->category_id = $category;
            $feed->save();

            foreach ($request->$tags as $tag) {
                $uniquTagsCounts = Tag::where('name', $tag)->get()->count();
                if ($uniquTagsCounts == 0) {
                    $newtag = new Tag;
                    $newtag->name = $tag;
                    $newtag->lang = $lang;
                    $newtag->save();
                }
            }
        }

        return back()->with([
            'alert' => 'Item has been saved successfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
        //$lang=App::getLocale();
        $feed=Feed::where([
            //'lang'=>$lang,
            'slug'=>$hash
            ])->firstOrFail();
        $feed->views=$feed->views+1;
        $feed->save();
        return view('front.factory',compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $initFeed = Feed::find($id);

        if (is_object($initFeed)) {
            $feed = Feed::where([
                'hash' => $initFeed->hash,
                'lang' => 'en'
            ])->first();
            $arFeed = Feed::where([
                'hash' => $initFeed->hash,
                'lang' => 'ar'
            ])->first();
            $trFeed = Feed::where([
                'hash' => $initFeed->hash,
                'lang' => 'tr'
            ])->first();
            $hash = $feed->hash;
            $categories = Category::where('lang', 'en')->get();
            $tagsEn = Tag::where('lang', 'en')->get();
            $tagsAr = Tag::where('lang', 'ar')->get();
            $tagsTr = Tag::where('lang', 'tr')->get();

            return view('feeds.edit', compact(['feed', 'arFeed', 'trFeed', 'hash', 'categories', 'tagsEn', 'tagsAr', 'tagsTr']));
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    { }

    private function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}
