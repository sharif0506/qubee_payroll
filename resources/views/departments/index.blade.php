@extends('layouts.adminlayout')
@section('title','Manage Department')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Department </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/department/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Department</a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Department Name </th>                     
                    <th class="text-center"> Department Status </th>
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                $counter = 1;
                @endphp
                @foreach($departments as $department)
                <tr class="text-center">
                    <td>{{$counter}}</td>
                    <td>{{$department->name}}</td>                    
                    <td>{{$department->status}}</td>
                    <td>
                        <a href="{{ url("admin/department/edit/".$department->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/department/delete/".$department->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete this department?');" > <u>Delete</u>  </a>
                    </td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach

            </tbody>
        </table>

        <div class="col-md-4 col-md-offset-4">

            @if(session("message"))
            <ul>          
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <li>{{ session("message") }}</li>
                </div>
            </ul>
            @endif
        </div>

    </div>

</div>
@endsection

