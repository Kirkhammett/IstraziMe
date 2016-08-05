<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  //  protected $fillable = ['commentBody'];

 //   public function user()
   // {
     //   return $this->belongsTo(User::class);
    //}

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
