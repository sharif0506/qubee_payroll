@extends('layouts.adminlayout')
@section('title','Manage Employees')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Employees </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/employee/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Employee </a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial </th>
                    <th class="text-center"> Employee ID </th>                     
                    <th class="text-center"> Employee Name </th>                     
                    <th class="text-center"> Designation </th>
                    <th class="text-center"> Department </th> 
                    <th class="text-center"> Status </th> 
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                $counter = 1;
                @endphp

                @foreach($employees as $employee)
                <tr class="text-center">
                    <td>{{ $counter }}</td>
                    <td>{{ $employee->employee_id }}</td>                    
                    <td>{{ $employee->details()->first_name ." ". $employee->details()->last_name }}</td>                    
                    <td>{{ $employee->details()->designation }}</td>                    
                    <td>{{ $employee->departmentName($employee->details()->department_id) }}</td>                    
                    <td>{{ $employee->status }}</td>
                    <td>
                        <a href="{{ url("admin/employee/".$employee->id) }}" class="btn-link" > <u> Details</u> </a>
                        &emsp;
                        <a href="{{ url("admin/employee/edit/".$employee->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/employee/delete/".$employee->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the subdepartment?');" > <u>Delete</u>  </a>
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

