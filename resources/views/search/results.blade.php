@extends('layouts.app')
@section('content')
        {{--  search results  --}}
@if(!$users->count())
 <p>oops!! user not found</p>
@else
<h2 style="text-align:center" > Search Results for '{{Request::input('query')}}'  </h2>
    @foreach($users as $user)
        <div  class="card-search">
        <a href="/profileview/{{$user->id}}"> 
  <img src="storage/images/{{$user->image}}" style="width:100%">
  <div class="container-search">

    <h4><b>{{ $user->username }}</b></h4> 
    <p> {{$user->first_name}} {{$user->last_name}} </p> 
  </div>
  {{--  friend requests  --}}
  </a> 
    @if( Auth::user()->hasfriendsRequestPending($user) )
                <p>waiting for {{ $user->username }} to accept request</p>
                @elseif(Auth::user()->hasfriendsRequestRecived($user))
                <a href="{{ route('friends.accept',['username'=>$user->username]) }}" class="btn btn-primary"> accept friend request </a>
                @elseif(Auth::user()->isFriendWith($user))
                <p> you and {{ $user->username }} are friends </p>
                @elseif(Auth::user()->id !== $user->id)
                <a href="{{ route('friends.add',['username'=>$user->username]) }}" style="float:right" class="btn btn-primary"> Add  friend </a>
                
@endif
</div>
    @endforeach
		
@endif
@endsection