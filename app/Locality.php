<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    //Locality has a method location to show to which location_id it refers to.
    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }
}
