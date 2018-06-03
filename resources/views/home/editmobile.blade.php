@extends('layouts.layout')
@section('title','Update Mobile Number')

@section('content')

<h3>Update Mobile No</h3>
<p>
    From this page you can change your mobile no.
    To do so, simply enter your new mobile no in the text box below.
</p>
<div class="col-md-6">
    <form class="form-group" method="post" action="{{url("/change/mobile")}}">
        <input class="form-control" type="text" name="mobile_no" value="{{old("mobile_no")}}" placeholder="New Mobile No" autocomplete="off" spellcheck="off" required />
        <br />
        {{ csrf_field() }} 
        <button class="btn btn-primary form-control" type="submit"> Update Mobile No </button>
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

