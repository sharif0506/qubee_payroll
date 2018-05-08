@extends('layouts.layout')
@section('title','Login')

@section('content')
<br />
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center" >Please Login </h3>
            </div>
            <div class="panel-body">

                <form method="post" action="{{ url('/login') }}">
                    <fieldset>

                        {{ csrf_field() }} 

                        <div class="form-group">
                            <input class="form-control" placeholder="User ID" name="user_id" type="text" value="{{ old('user_id') }}" autocomplete="off" spellcheck="false" required />
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" required />
                        </div>

                        <input class="btn btn-success btn-block" type="submit" value="Login" />

                    </fieldset>
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
        </div>
    </div>
</div>
@endsection

