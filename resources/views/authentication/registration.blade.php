@extends('layouts.layout')
@section('title','Registration')

@section('content')

<div class="row vertical-offset-100">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center" >Account Information</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="{{ url('/registration') }}">
                    <fieldset>

                        {{ csrf_field() }} 

                        <div class="form-group">
                            <input class="form-control" placeholder="User ID" name="user_id" type="text" value="{{ old('user_id') }}" autocomplete="off" spellcheck="false" required />
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Employee Email" name="email" type="text" value="{{ old('email') }}" autocomplete="off" spellcheck="false" required />
                        </div>

                        <div class="form-group">
                            <!--<input class="form-control" placeholder="Company Code" name="company_code" type="text" value="{{ old('email') }}" autocomplete="off" required />-->
                            <select class="form-control" placeholder="Company Code" name="company_code">
                                @foreach($companyCodes as $companyCode)
                                <option value="{{$companyCode->id}}">{{$companyCode->code_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Employee ID" name="employee_id" type="text" value="{{ old('employee_id') }}" autocomplete="off" spellcheck="false" required />
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" placeholder="Mobile No (Example:01841000000)" name="mobile_no" type="text" value="{{ old('mobile_no') }}" autocomplete="off" spellcheck="false" required />
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" required />
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" required />
                        </div>

                        <input class="btn btn-success btn-block" type="submit" value="Create Account" />

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

