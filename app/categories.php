<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //

    public function types()
    {
        return $this->belongsTo('App\types');
    }
}
