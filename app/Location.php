<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function comments()
    {
        return $this->hasMany('App\Comment', 'location_id');
    }
}
