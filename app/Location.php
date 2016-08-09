<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //comments and locality methods to describe the relationships that a comment and a locality have
    //with a specific location
    public function comments()
    {
        return $this->hasMany('App\Comment', 'location_id');
    }

    public function locality()
    {
        return $this->hasOne('App\Locality', 'location_id');
    }
}
