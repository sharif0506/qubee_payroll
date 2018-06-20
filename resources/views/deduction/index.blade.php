@extends('layouts.adminlayout')
@section('title','Manage Deduction')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Deduction </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/deduction/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Deduction </a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Deduction </th>                     
                    <th class="text-center"> Status </th>
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                    $counter = 1;
                @endphp

                @foreach($deductions as $deduction)
                <tr class="text-center">
                    <td>{{ $counter }}</td>
                    <td>{{ $deduction->name }}</td>                                       
                    <td>{{ $deduction->status }}</td>
                    <td>
                        <a href="{{ url("admin/deduction/edit/".$deduction->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/deduction/delete/".$deduction->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the deduction?');" > <u>Delete</u>  </a>
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

