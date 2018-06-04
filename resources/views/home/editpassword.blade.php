@extends('layouts.layout')
@section('title','Change Password')

@section('content')

<h3>Change Password</h3>
<p>
    Use forms below to change your password.
    Make sure that your password is strong enough.
</p>
<div class="col-md-6">
    <form class="form-group" method="post" action="{{url("/change/password")}}">
        <input class="form-control" type="password" name="current_password" placeholder="Current Password" required />
        <br />
        <input class="form-control" type="password" name="new_password" placeholder="New Password" required />
        <br />
        <input class="form-control" type="password" name="new_password_confirmation" placeholder="Confirm New Password" required />
        <br />
        {{ csrf_field() }} 
        <button class="btn btn-primary form-control" type="submit"> Change Password </button>
    </form>

    <br />
    @if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session("message"))
    <div class="alert alert-success">
        <ul>
            <li>{{ session("message") }}</li>
        </ul>
    </div>
    @endif
</div>

@endsection

