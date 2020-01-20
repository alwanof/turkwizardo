<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index($lang = 'en')
    {
        /*$feeds = Feed::with('category')->get();
        return $feeds;*/
        return Category::where('lang', $lang)->latest()->paginate(10);
    }

    public function search(Request $request, $lang = 'en')
    {
        $categories = Category::where('lang', $lang)->Where('name', 'LIKE', '%' . $request->keywords . '%')
            ->paginate(10);

        return $categories;
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (is_object($category)) {
            $hash = $category->hash;

            if($category->feeds->count()==0){
                $covers = glob('storage/uploads/categories/cover/' . "$hash.*");
                foreach ($covers as $filename) {
                    File::delete($filename);
                }
                Category::where('hash', $category->hash)->delete();
            }

        }
        return response()->json(1, 200);
    }
}
