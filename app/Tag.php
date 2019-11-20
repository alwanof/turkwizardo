<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function feeds(){
        return Feed::where('tags','like','%'.$this->name.'%')->get();
    }
}
