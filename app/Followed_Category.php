<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

//use Illuminate\Database\Eloquent\Relations\Pivot;

class Followed_Category extends Model
{
    //public $timestamps = false;

    public function User(){
        return $this->belongsTo('App\User', 'id');
    }

}
/*
class Followed_Category2 extends Pivot {

}
*/