<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    protected $table = 'friends';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function posts(){
        return $this->belongsTo('App\posts','user_id');
    }
}
