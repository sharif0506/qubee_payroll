@extends('layouts.adminlayout')
@section('title','Manage Tax Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Manage Tax Slab </h3>
    <hr />

    <div class="col-sm-3">
        <a href="{{ url("/admin/taxslab/add") }}" class="btn btn-primary form-control" role="button">
            <span class="glyphicon glyphicon-plus-sign"></span> Add New Tax Slab</a>
    </div>

    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center"> Serial No. </th>
                    <th class="text-center"> Slab Order </th>                     
                    <th class="text-center"> Amount </th>                     
                    <th class="text-center"> Tax Rule </th>
                    <th class="text-center"> Tax Rate </th>
                    <th class="text-center"> Operation </th> 
                </tr>
            </thead>
            <tbody>
                @php 
                $counter = 1;
                @endphp

                @foreach($taxSlabs as $taxSlab)
                <tr class="text-center">
                    <td>{{$counter}}</td>
                    <td>{{$taxSlab->slab_order}}</td>                    
                    <td>{{$taxSlab->amount}}</td>                    
                    <td>{{$taxSlab->tax_rule}}</td>                    
                    <td>{{$taxSlab->tax_rate}}</td>                    
                    <td>
                        <a href="{{ url("admin/taxslab/edit/".$taxSlab->id) }}" class="btn-link" > <u>Edit</u> </a>
                        &emsp;
                        <a href="{{ url("admin/taxslab/delete/".$taxSlab->id) }}" class="btn-link" onclick="return confirm('Are you sure you want to delete the tax slab?');" > <u>Delete</u>  </a>
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

