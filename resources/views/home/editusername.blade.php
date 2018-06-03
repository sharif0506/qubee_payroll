@extends('layouts.layout')
@section('title','Change User Name')

@section('content')

<h3>Change Username</h3>
<p>
    From this page you can change your username.
    To do so, simply enter your new username in the TextBox below.
    Please do not use space in username.
</p>
<div class="col-md-6">
    <form class="form-group" method="post" action="{{url("/change/username")}}">
        <input class="form-control" type="text" name="user_id" placeholder="New User Name" autocomplete="off" spellcheck="off" required />
        <br />
        {{ csrf_field() }} 
        <button class="btn btn-primary form-control" type="submit"  >Change User Name</button>
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
</div>

@endsection

