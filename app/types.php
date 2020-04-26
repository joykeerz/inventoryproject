<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    //
    public function categories()
    {
        return $this->hasMany('App\categories');
    }
}

