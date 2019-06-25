@extends('layouts.app')

@section('content')
<body style="background:url(img/header-bg.jpg)" >
    
</body>
{{--  edit profile page  --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('profilecontrolleredit') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ Auth::user()->username }}"  autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"  autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ Auth::user()->first_name }}"  autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ Auth::user()->last_name }}" >

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="number" class="form-control" name="phonenumber" value="{{ Auth::user()->phone_number1}}" >

                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phonenumber1') ? ' has-error' : '' }}">
                            <label for="phonenumber1" class="col-md-4 control-label">Phone Number 1</label>

                            <div class="col-md-6">
                                <input id="phonenumber1" type="number" class="form-control" name="phonenumber1" value="{{ Auth::user()->phone_number2}}" >

                                @if ($errors->has('phonenumber1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" >
                            </div>
                        </div>


                       <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="gender" id="inlineFormCustomSelectPref">
                                    <option selected>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                 <div class="col-md-6">
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                      <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="bithdate" class="col-md-4 control-label">BirthDate</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ Auth::user()->birthdate}}"  >

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('hometown') ? ' has-error' : '' }}">
                            <label for="hometown" class="col-md-4 control-label">Home Town</label>
                        <div class="col-md-6">
                                <input id="hometown" type="text" class="form-control" name="hometown" value="{{ Auth::user()->hometown }}" >

                                @if ($errors->has('hometown'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hometown') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mstatus') ? ' has-error' : '' }}">
                            <label for="mstatus" class="col-md-4 control-label">Marital Status</label>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="mstatus" value="{{Auth::user()->martial_status}}" id="inlineFormCustomSelectPref">
                                    <option value="" selected>Choose Your relationship</option>
                                    <option value="Single">Single</option>
                                    <option value="Engaged">Engaged</option>
                                    <option value="Married">Married</option>
                                </select>
                                
                                @if ($errors->has('mstatus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mstatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                     <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" class="col-md-4 control-label">Bio</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="bio" value="{{ Auth::user()->bio }}" id="bio"></textarea>
                            </div>
                        </div>
                           <div class="col-md-6 col-md-offset-7">
                        
                      <a href="{{ url('/changepassword') }}"class="btn btn-primary">
                            Change Password
                      </a>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection