@extends('layouts.adminlayout')
@section('title','Add New Tax Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Add New Tax Slab </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="{{ url('admin/taxslab/add') }}">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <label> Slab Order: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Order" name="slab_order" type="number" value="{{ old('slab_order') }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Amount: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Amount" name="amount" type="number" value="{{ old('amount') }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Tax Rule: </label>
                    <select class="form-control input-sm"  name="tax_rule" required >                    
                        <option value="Male" > Male </option>
                        <option value="Female" > Female </option>
                        <option value="Aged" > Aged </option>
                        <option value="Disabled" > Disabled </option>
                    </select>
                </div>

                <div class="form-group">
                    <label> Tax Rate: </label>
                    <input class="form-control input-sm" placeholder="Tax Rate" name="tax_rate" type="number" value="{{ old('tax_rate') }}" autocomplete="off"  required />
                </div>

                <div class="form-group">
                    <input  type="checkbox" name="remark" value="on_remaining_balance"> Slab will be on remaining balance  <br>
                </div>

                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Add Tax Slab" />
                </div>

                <a href="{{ url('admin/taxslab') }}" class="btn btn-primary form-control" >
                    Back to Tax Slab Management
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

