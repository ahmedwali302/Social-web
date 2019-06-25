@extends('layouts.app')

@section('content')
<body style="background:url(img/header-bg.jpg)" >
    
</body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('passwordcontrolleredit') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                                         
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="hometown" class="col-md-4 control-label">Password confirmation</label>
                        <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change
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