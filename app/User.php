<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','first_name',
        'last_name',
        'gender',
        'phone_number1',
        'phone_number2',
        'birthdate',
        'bio',
        'marital_status',
        'hometown',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table = 'users';

    public function posts(){
        return $this->hasMany('App\posts','user_id');
    }

        public function friendsOfMine(){
            return $this->belongsToMany('App\User','friends','user_id','friend_id');
        }
        public function friendsOf(){
            return $this->belongsToMany('App\User','friends','friend_id','user_id');
        }

        public function friends(){
            return $this->friendsOfMine()->wherePivot('accepteds',true)->get()->
            merge($this->friendsOf()->wherePivot('accepteds',true)->get());
        }
        public function friendsRequest(){
            return $this->friendsOfMine()->wherePivot('accepteds',false)->get();
        }
        public function friendsRequestPending(){
            return $this->friendsOf()->wherePivot('accepteds',false)->get();
        }
        public function hasfriendsRequestPending(User $user){
            return(bool) $this->friendsRequestPending()->where('id',$user->id)->count();
        }
        public function hasfriendsRequestRecived(User $user){
            return(bool) $this->friendsRequest()->where('id',$user->id)->count();
        }
        public function addFriend(User $user){
             $this->friendsOf()->attach($user->id);
        }
        public function deleteFriend(User $user){
             $this->friendsOf()->detach($user->id);
             $this->friendsOfMine()->detach($user->id);
            
        }
        public function acceptfriendsRequest(User $user){
            return $this->friendsrequest()->where('id',$user->id)->first()->pivot->
            update(['accepteds'=>true]);
        }
        public function isFriendWith(User $user){
            return(bool) $this->friends()->where('id',$user->id)->count();
        }

        public function likes(){
            return $this->hasMany('App\User','user_id');
        }

        public function hasLikepost(posts $posts){
            return(bool) $posts->likes->where('user_id',$this->id)->count();
        }
}
