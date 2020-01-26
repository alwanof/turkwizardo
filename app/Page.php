<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //protected $appends=['childs','parrent'];
    function getChildsAttribute(){
        return Page::where('mainPageID',$this->id)->get();
    }

    function getParrentAttribute(){
        return Page::find($this->mainPageID);
    }
}
