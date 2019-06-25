<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex(){
        $friends =  Auth::user()->friends();
        $request =  Auth::user()->friendsRequest();
        
        return view('friends.index')->with('friends',$friends)->with('request',$request);
    }

    public function getAdd($username){

        $user = User::where('username',$username)->first();

        if(!$user){
          return  redirect()->route('home')->with('info','user not found');
        }
        if (Auth::user()->id == $user->id){
            return redirect()->route('home');
        }

        if(Auth::user()->hasfriendsRequestPending($user) || $user->hasfriendsRequestPending(
        Auth::user())){
            return redirect()->route('home',['username'=>$user->username])->with('info','friend request already sent');
        }
        if(Auth::user()->isFriendWith($user))
            {
                return redirect()->route('home',['username'=>$user->username])->with('info','you are friends already');
            }
        
        Auth::user()->addFriend($user);
        return redirect()->route('home',['username'=>$user->username])->with('info','your friend request sent successfuly');
        
            
    }
    public function getAccept($username)
    {
        $user = User::where('username',$username)->first();
        
                if(!$user){
                  return  redirect()->route('home')->with('info','user not found');
                }
                if(!Auth::user()->hasfriendsRequestRecived($user)){
                        return redirect()->route('home');
                    }

                    
                    Auth::user()->acceptfriendsRequest($user);
                    return redirect()->back()->with('info','friend request accepted');
                    
    }
    public function postDelete($username){
        $user = User::where('username',$username)->first();
        if(!Auth::user()->isFriendWith($user))
     {
         return redirect()->back();
     }    
     Auth::user()->deleteFriend($user);

     return redirect()->route('home')->with('info','friend deleted you are no later friends');

    }
}
