<?php

namespace App\Http\Controllers\API;

use App\Feed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang = 'en')
    {
        /*$feeds = Feed::with('category')->get();
        return $feeds;*/
        return Feed::where('lang', $lang)->with('category')->latest()->paginate(10);
    }

    public function search(Request $request, $lang = 'en')
    {
        $feeds = Feed::where('lang', $lang)->Where('name', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('email', 'LIKE', '%' . $request->keywords . '%')
            ->with('category')
            ->paginate(10);

        return $feeds;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feed = Feed::find($id);
        if (is_object($feed)) {
            $hash = $feed->hash;
            File::deleteDirectory('storage/uploads/feeds/gallery/' . $hash);
            $covers = glob('storage/uploads/feeds/cover/' . "$hash.*");
            foreach ($covers as $filename) {
                File::delete($filename);
            }

            Feed::where('hash', $feed->hash)->delete();
        }
        return response()->json(1, 200);
    }
}