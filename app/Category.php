<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $appends = ['cover'];
    public function feeds()
    {
        return $this->hasMany(\App\Feed::class);
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }



    public function getCoverAttribute()
    {
        $path = Storage::exists('/public/uploads/categories/cover/' . $this->hash . '.png');
        $cover = ($path) ? asset('storage/uploads/categories/cover/' . $this->hash . '.png') : asset('storage/uploads/categories/cover/0.png');
        return $cover;
    }
}