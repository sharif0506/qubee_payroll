@extends('layouts.adminlayout')
@section('title','Add New Department')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Add New Department </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="{{ url('admin/department/add') }}">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <input class="form-control" placeholder="Department's Name" name="name" type="text" value="{{ old('name') }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Status: </label>
                    <select class="form-control"  name="status" required >
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Add Department" />
                </div>

                <a href="{{ url("/admin/department") }}" class="btn btn-primary form-control" >
                    Back to Deparment Management
                </a> 
            </fieldset>

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
        </form>


    </div>

</div>
@endsection

