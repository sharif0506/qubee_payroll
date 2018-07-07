@extends('layouts.adminlayout')
@section('title','Add New Tax Rebate Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Add New Tax Rebate Slab </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="{{ url('admin/taxrebateslab/add') }}">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <label> Slab Order: </label>
                    <input class="form-control input-sm" placeholder="Tax Rebate Slab Order" name="slab_order" type="number" value="{{ old('slab_order') }}" autocomplete="off" required />
                </div>

                <div class="form-group">
                    <label> Amount: </label>
                    <input class="form-control input-sm" placeholder="Tax Rebate Slab Amount" name="amount" type="number" value="{{ old('amount') }}" autocomplete="off"  required />
                </div>

                
                <div class="form-group">
                    <label> Tax Rebate Rate: </label>
                    <input class="form-control input-sm" placeholder="Tax Rebate Rate" name="rebate_rate" type="number" value="{{ old('rebate_rate') }}" autocomplete="off"  required />
                </div>

                
                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Add Tax Rebate Slab" />
                </div>

                <a href="{{ url('admin/taxrebateslab') }}" class="btn btn-primary form-control" >
                    Back to Tax Rebate Management
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

