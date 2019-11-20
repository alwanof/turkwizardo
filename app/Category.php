<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function feeds(){
        return $this->hasMany(\App\Feed::class);
    }
}
