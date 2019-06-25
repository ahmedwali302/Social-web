<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\likes;
class posts extends Model
{
    protected $fillable = [
        'image','caption','user_id' 
    ];
    protected $table = 'posts';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function likes(){
        return $this->morphMany('App\likes','likePost');
    }
    public function friends(){
        return $this->belongsTo('App\friends','user_id');
    }



}
