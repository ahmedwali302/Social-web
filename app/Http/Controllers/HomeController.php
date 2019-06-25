<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\User;
use App\friends;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
          
            $posts = posts::where(function($query){
                return $query->where('user_id',Auth::user()->id)->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
            })->orderBy('created_at','desc')->get();
        
            return view('home')->with('posts',$posts);
            }
        }
    
}
