@extends('layouts.adminlayout')
@section('title','Manage Sub Department')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Sub Department </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/subdepartment/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Sub Department</a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Sub Department </th>                     
                    <th class="text-center"> Department </th>                     
                    <th class="text-center"> Status </th>
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                    $counter = 1;
                @endphp
                
                @foreach($subDepartments as $subDepartment)
                <tr class="text-center">
                    <td>{{$counter}}</td>
                    <td>{{$subDepartment->name}}</td>                    
                    <td>{{$subDepartment->getDepartmentName()}}</td>                    
                    <td>{{$subDepartment->status}}</td>
                    <td>
                        <a href="{{ url("admin/subdepartment/edit/".$subDepartment->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/subdepartment/delete/".$subDepartment->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the subdepartment?');" > <u>Delete</u>  </a>
                    </td>
                </tr>
                @php
                    $counter++;
                @endphp
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection

