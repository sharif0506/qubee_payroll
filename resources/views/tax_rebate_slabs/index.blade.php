@extends('layouts.adminlayout')
@section('title','Manage Tax Rebate Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Tax Rebate Slab </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/taxrebateslab/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Tax Rebate Slab</a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Slab Order </th>                     
                    <th class="text-center"> Amount </th>                     
                    <th class="text-center"> Rebate Rate </th>                   
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                $counter = 1;
                @endphp

                @foreach($taxRebateSlabs as $taxRebateSlab)
                <tr class="text-center">
                    <td>{{$counter}}</td>
                    <td>{{$taxRebateSlab->slab_order}}</td>                    
                    <td>{{$taxRebateSlab->amount}}</td>                    
                    <td>{{$taxRebateSlab->rebate_rate}}</td>                    
                    <td>
                        <a href="{{ url("admin/taxrebateslab/edit/".$taxRebateSlab->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/taxrebateslab/delete/".$taxRebateSlab->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the tax rebate slab?');" > <u>Delete</u>  </a>
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

