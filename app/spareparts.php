<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spareparts extends Model
{
    //
    public function categories()
    {
        return $this->belongsTo('App\categories');
    }
}
