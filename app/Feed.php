<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Feed extends Model
{
    protected $appends = ['cover', 'pics'];

    function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromDate($date)->diffForHumans();
    }

    public function getCoverAttribute()
    {
        $path = Storage::exists('/public/uploads/feeds/cover/' . $this->hash . '.jpg');
        $cover = ($path) ? asset('storage/uploads/feeds/cover/' . $this->hash . '.jpg') : asset('storage/uploads/feeds/0.png');
        return $cover;
    }

    public function getPic1Attribute()
    {
        $path = Storage::exists('/public/uploads/feeds/gallery/' . $this->hash  . '/1.jpg');
        $item = ($path) ? asset('storage/uploads/feeds/gallery/' . $this->hash  . '/1.jpg') : asset('storage/uploads/feeds/1.png');
        return $item;
    }

    public function getPicsAttribute()
    {
        $items = [];
        for ($i = 1; $i < 7; $i++) {
            $path = Storage::exists('/public/uploads/feeds/gallery/' . $this->hash  . '/' . $i . '.jpg');
            $items[$i] = ($path) ? asset('storage/uploads/feeds/gallery/' . $this->hash  . '/' . $i . '.jpg') : asset('storage/uploads/feeds/0' . $i . '.png');
        }
        return $items;
    }
}
