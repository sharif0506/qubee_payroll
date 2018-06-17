@extends('layouts.adminlayout')
@section('title','Manage Salary')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Salary </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/salary/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Salary </a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Salary </th>                     
                    <th class="text-center"> Tax Limit 1 (Percent of Basic) </th>                     
                    <th class="text-center"> Tax Limit 2 </th>                     
                    <th class="text-center"> Tax Limit 3 </th>                     
                    <th class="text-center"> Rule </th>
                    <th class="text-center"> Salary Type </th>
                    <th class="text-center"> Status </th>
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                $counter = 1;
                @endphp

                @foreach($salaries as $salary)
                <tr class="text-center">
                    <td>{{ $counter }}</td>
                    <td>{{ $salary->name }}</td>                    
                    <td>{{ $salary->tax_limit1 }}</td>                    
                    <td>{{ $salary->tax_limit2 }}</td>                    
                    <td>{{ $salary->tax_limit3 }}</td>                    
                    <td>{{ $salary->condition }}</td>                    
                    <td>{{ $salary->salary_type }}</td>                    
                    <td>{{ $salary->status }}</td>
                    <td>
                        <a href="{{ url("admin/salary/edit/".$salary->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/salary/delete/".$salary->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the salary?');" > <u>Delete</u>  </a>
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

