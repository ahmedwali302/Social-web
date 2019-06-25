<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/profileContinue',['uses'=>'profileController@submit','as'=>'profilecontroller','middleware'=>['auth']]);
Route::post('/profileupdate',['uses'=>'profileController@edit','as'=>'profilecontrolleredit','middleware'=>['auth']]);
Route::post('/changepassword',['uses'=>'profileController@changepassword','as'=>'passwordcontrolleredit','middleware'=>['auth']]);


Route::get('/profileEdit',[function(){
    return view('profile_edit');
},
'middleware'=>['auth']
] );

Route::get('/changepassword',[function(){
    return view('changepassword');
},
'middleware'=>['auth']
]);

Route::get('/profile',[function(){
    return view('profile_view')->with('another_profile');
} ,
'middleware'=>['auth']
]);

Route::get('/profileview',[function(){
    return view('profile');
} , 
  'middleware'=>['auth']]

);

Route::get('/profileview/{id}',['uses'=>'profileController@showprofile', 
  'middleware'=>['auth']]

);
 
Route::post('/post', [
    'uses'=>'\App\Http\Controllers\postController@submit',
    'as'=> 'posts.post',
    'middleware'=>['auth'], 
    ]); 
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', [
    'uses'=>'\App\Http\Controllers\SearchController@getResults',
    'as'=> 'search.results',
    'middleware'=>['auth'], 
    
    ]);
    Route::get('/user/{username}', [
        'uses'=>'\App\Http\Controllers\ProfileController@getProfile',
        'as'=> 'profile.index',
        'middleware'=>['auth'], 
        
        ]); 
  
           
                Route::get('/friends', [
                    'uses'=>'\App\Http\Controllers\FriendController@getIndex',
                    'as'=> 'friends.index',
                    'middleware'=>['auth'], 
                    ]); 
                    Route::get('/friends/add/{username}', [
                        'uses'=>'\App\Http\Controllers\FriendController@getAdd',
                        'as'=> 'friends.add',
                        'middleware'=>['auth'], 
                        ]);
                        Route::get('/friends/accept/{username}', [
                            'uses'=>'\App\Http\Controllers\FriendController@getAccept',
                            'as'=> 'friends.accept',
                            'middleware'=>['auth'], 
                            ]);
                            Route::post('/friends/delete/{username}', [
                                'uses'=>'\App\Http\Controllers\FriendController@postDelete',
                                'as'=> 'friends.delete',
                                'middleware'=>['auth'], 
                                ]);   
                                
                                
                                Route::get('/posts/{postId}/like', [
                                    'uses'=>'\App\Http\Controllers\postController@getlike',
                                    'as'=> 'posts.like',
                                    'middleware'=>['auth'], 
                                    ]);