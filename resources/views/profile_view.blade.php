@extends('layouts.app')

@section('content')

{{--  profile page of users   --}}
@if($another_profile)
        {{--  user not authenticated  --}}
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="asset('images/{{$another_profile->image}}')" />
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="asset('images/{{$another_profile->image}}')" />
        </div>
        <div class="card-info"> <span class="card-title">{{$another_profile->username}}</span>
 </div>

    </div>
   
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                <div class="hidden-xs">Posts</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <a type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>
                <div class="hidden-xs">Friends</div>
            </a>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">

        {{--  @if(User::find($another_profile->id)->posts)
            @foreach(User::find($another_profile->id)->posts as $item)
              <ul  class="list-group">
             
  <li class="list-group-item"> 
  <div style="display:flex;border-bottom:1px solid gray" >
  <img style="height:100px" src="storage/images/{{$item->user->image}}" />
  <h4>{{$item->user->username}}</h4>
  </div>
      <div class = "thumbnail left">
         <img style="max-height:300px"  src = "storage/images/{{$item->image}}" >
      </div>
              
      <div class = "caption">
         <h5> {{$item->caption}} </h5>
         <u> {{$item->created_at}} </u>
         <p>
            <a href = "#" class = "btn btn-primary" role = "button">
               Button
            </a> 
         </p>
         
      </div>
  </li>
      
</ul>
            @endforeach
        @endif  --}}

        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="text-align:center" >{{$another_profile->first_name}} {{$another_profile->last_name}}</h3>
          <ul class="list-group">
  <li class="list-group-item">Email : {{$another_profile->email}}</li>
  <li class="list-group-item">Phone 1 : {{$another_profile->phone_number1}}</li>
  <li class="list-group-item">Phone 2 : {{$another_profile->phone_number2}}</li>
  <li class="list-group-item">Hometown : {{$another_profile->hometown}}</li>
  @if (Auth::user()->isFriendWith($another_profile))
  <li class="list-group-item">Birthdate : {{$another_profile->birthdate}}</li>
  <li class="list-group-item">Bio : {{$another_profile->bio}}</li>
  
  @endif
  <li class="list-group-item">Gender : {{$another_profile->gender}}</li>
  <li class="list-group-item">Martial status : {{$another_profile->marital_status}}</li>
  
</ul>
        </div>
        <div class="tab-pane fade in" id="tab3">
            @if($another_profile->friends())
                        <ul class="list-group">
            @foreach($another_profile->friends() as $item)
                    
  <li class="list-group-item">
        <a href="/profileview/{{$item->id}}"> 
  <img height="50px" src="asset('images/{{$item->image}}')}" />
  username : {{$item->username}}</li>
        </a>  
            @endforeach
        </ul>
            @endif
        </div>
      </div>
    </div>
@else

{{--  authenticated user  --}}
    <div class="card hovercard">
        <div class="card-background">
                @if (Auth::user()->image)
                <img src="storage/images/{{Auth::user()->image}}" />
                @else
                @if (Auth::user()->gender=="male")
                <img height="50px" src="storage/images/male.jpg" />                
                @else
                <img height="50px" src="storage/images/female.jpg" />                
                                    
                @endif
                @endif
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
                @if (Auth::user()->image)
                <img src="storage/images/{{Auth::user()->image}}" />
                @else
                @if (Auth::user()->gender=="male")
                <img height="50px" src="storage/images/male.jpg" />                
                @else
                <img height="50px" src="storage/images/female.jpg" />                
                                    
                @endif
                @endif
        </div>
        <div class="card-info"> <span class="card-title">{{Auth::user()->username}}</span>

        </div>
    </div>
   
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                <div class="hidden-xs">Posts</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        {{--  friends of user   --}}
        <div class="btn-group" role="group">
            <a type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>
                <div class="hidden-xs">Friends</div>
            </a>
        </div>
    </div>
        <div class="well">
      <div class="tab-content">
     {{--  posts of user  --}}
      
        <div class="tab-pane fade in active" id="tab1">
        @if(Auth::user()->posts)
            @foreach(Auth::user()->posts as $item)
              <ul  class="list-group">
             
  <li class="list-group-item"> 
  <div style="display:flex;border-bottom:1px solid gray" >
        @if (Auth::user()->image)
        <img height="100px" src="storage/images/{{$item->user->image}}" />
        @else
        @if (Auth::user()->gender=="male")
        <img height="50px" src="storage/images/male.jpg" />                
        @else
        <img height="50px" src="storage/images/female.jpg" />                
                            
        @endif
        @endif
  <h4>{{$item->user->username}}</h4>
  </div>
      <div class = "thumbnail left">
          @if ($item->image)
         <img style="max-height:300px"  src = "storage/images/{{$item->image}}" >
    @else
    <img style="max-height:300px"  src = "storage/images/nocap.jpg" >
                  
          @endif
      </div>
              
      <div class = "caption">
         <h5> {{$item->caption}} </h5>
         <u> {{$item->created_at}} </u>
         <p>
            <a href = "#" class = "btn btn-primary" role = "button">
               Button
            </a> 
         </p>
         
      </div>
  </li>
      
</ul>
            @endforeach
        @endif
        </div>
        {{--  user informations  --}}
        <div class="tab-pane fade in" id="tab2">
            <h3 style="text-align:center" >{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
          <ul class="list-group">
  <li class="list-group-item">Email : {{Auth::user()->email}}</li>
  <li class="list-group-item">Phone 1 : {{Auth::user()->phone_number1}}</li>
  <li class="list-group-item">Phone 2 : {{Auth::user()->phone_number2}}</li>
  <li class="list-group-item">Hometown : {{Auth::user()->hometown}}</li>
  <li class="list-group-item">Gender : {{Auth::user()->gender}}</li>
  <li class="list-group-item">Martial status : {{Auth::user()->marital_status}}</li>
  <li class="list-group-item">Birthdate : {{Auth::user()->birthdate}}</li>
  <li class="list-group-item">Bio : {{Auth::user()->bio}}</li>
  
  
</ul>
        </div>
        <div class="tab-pane fade in" id="tab3">
        <ul class="list-group">
        @if(Auth::user()->friends())
            @foreach(Auth::user()->friends() as $item)
                
  <li class="list-group-item">
      
        <a href="/profileview/{{$item->id}}"> 
            <form action="{{ route('friends.delete',['username'=>$item->username]) }}" method="post" >
                    <input type="submit" value="Delete"  style="float:right;" class="btn btn-danger" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
            @if ($item->image)
            <img height="50px" src="storage/images/{{$item->image}}" />
            @else
            @if ($item->gender=="male")
            <img height="50px" src="storage/images/male.jpg" />                
            @else
            <img height="50px" src="storage/images/female.jpg" />                
                                
            @endif
            @endif
  username : {{$item->username}}
        </a>
      
    </li>
    
      
 <li class="list-group-item" > Name : {{$item->first_name}} {{$item->last_name}}</li>
            @endforeach
</ul>
            
           
        @endif

       
        <div class="row">
            <div class="col-lg-6">
                    <h4>Friend requests</h4>

            @if(count(Auth::user()->friendsRequest())==0 )
                <h5>You has no friend requests  </h5>
            @else
        <ul class="list-group">
            @foreach(Auth::user()->friendsRequest() as $item)
            <li class="list-group-item">
                @if ($item->image)
                <img height="50px" src="storage/images/{{$item->image}}" />
                @else
                @if ($item->gender=="male")
                <img height="50px" src="storage/images/male.jpg" />                
                @else
                <img height="50px" src="storage/images/female.jpg" />                
                                    
                @endif
                @endif
                username : {{$item->username}}
                <a class="btn btn-primary" style="float:right" href="{{ route('friends.accept',['username'=>$item->username]) }}" >Accept</a>
            </li>
 <li class="list-group-item" > Name : {{$item->first_name}} {{$item->last_name}}</li>
                
            @endforeach
            @endif 
                           </div>
     </div>
        </ul>
        </div>
     
      </div>
    </div>
    @endif
            
    
@endsection