@extends('layouts.adminlayout')
@section('title','Edit Sub Department')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Edit Sub Department </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <input class="form-control" placeholder="Sub Department's Name" name="name" type="text" value="{{ $subDepartment->name }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Department: </label>
                    <select class="form-control"  name="department_id" required >
                        @foreach($departments as $department)
                        <option value="{{$department->id}}" {{ $department->id == $subDepartment->department_id ? 'selected="selected"' : '' }} > {{$department->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label> Status: </label>
                    <select class="form-control"  name="status" required >
                        <option value="Active" {{ $department->status == 'Active' ? 'selected="selected"' : '' }}>Active</option>
                        <option value="Deactive" {{ $department->status == 'Deactive' ? 'selected="selected"' : '' }}>Deactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Edit Sub Department" />
                </div>

                <a href="{{ url("/admin/subdepartment") }}" class="btn btn-primary form-control" >
                    Back to Sub Department Management
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

