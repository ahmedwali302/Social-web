<?php

namespace App;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use Notifiable;
    protected $table = 'likes';

    public function likePost(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    //
}
