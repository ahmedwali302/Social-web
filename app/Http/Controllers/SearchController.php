<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  
    public function getResults(Request $request )
    {
        
        $query = $request->input('query');

        if(!$query){

            return redirect()->route('home');
        }
        $users = User::Where(DB::raw("CONCAT(first_name, ' ' ,last_name)"),
        'LIKE' , "%{$query}%")
        ->orWhere('username','LIKE', "%{$query}%")
        ->orWhere('email','LIKE', "%{$query}%")
        ->orWhere('hometown','LIKE', "%{$query}%")        
        ->get();

        return view('search.results')->with('users', $users);
    }
}
