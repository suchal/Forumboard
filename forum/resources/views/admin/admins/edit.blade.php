@extends('layouts.app')

@section('title', "Edit Admin's profile")
@section('content')
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">Edit Admin's profile</div>
    <div class="panel-body">
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="/admin/admins/{{ $user->username }}">
            {!! csrf_field() !!}
            {!! method_field('PATCH') !!}
        <div class="col-md-6">
        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
            <label for="bio" class="col-md-4 control-label">Tell us more about yourself:</label>

            <div class="col-md-6">
                
                <textarea id="bio" type="text" class="form-control" name="bio" autofocus>{{ $user->bio ?? '' }}</textarea>

                @if ($errors->has('bio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bio') }}</strong>
                    </span>
                @endif
            </div>
        </div>      
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">username</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ $user->username ?? '' }}"  autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" >

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                <div class="col-md-6">
                    <input id="phone_number" type="phone_number" class="form-control" name="phone_number" value="{{ $user->phone_number ?? '' }}" >
                    <label><input type="checkbox" {{ ($user->show_phone_number) ? 'checked' : '' }} name="show_phone_number"> Do you want to show Phone number?</label>

                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            

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
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        </div>
    

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Update Profile
                </button>
            </div>
        </div>
        </form>
        <div>
            @if(count($errors->all()))
            <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
            @if(isset($duplicates))
            <ul>
            {{ $duplicates }}
                @foreach ($duplicates as $error)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    </div>
</div>
</div>
@stop