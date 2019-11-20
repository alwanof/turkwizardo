<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    function childs(){
        return Page::where('mainPageID',$this->id)->get();
    }

    function parrent(){
        return Page::find($this->mainPageID);
    }
}
