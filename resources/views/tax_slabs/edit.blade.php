@extends('layouts.adminlayout')
@section('title','Edit Tax Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Edit Tax Slab </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <label> Slab Order: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Order" name="slab_order" type="number" value="{{ $taxSlab->slab_order }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Amount: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Amount" name="amount" type="number" value="{{ $taxSlab->amount }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Tax Rule: </label>
                    <select class="form-control input-sm"  name="tax_rule" required >                    
                        <option value="Male" {{ $taxSlab->tax_rule == 'Male' ? 'selected="selected"' : '' }} > Male </option>
                        <option value="Female" {{ $taxSlab->tax_rule == 'Female' ? 'selected="selected"' : '' }} > Female </option>
                        <option value="Aged" {{ $taxSlab->tax_rule == 'Aged' ? 'selected="selected"' : '' }} > Aged </option>
                        <option value="Disabled" {{ $taxSlab->tax_rule == 'Disabled' ? 'selected="selected"' : '' }} > Disabled </option>
                    </select>
                </div>

                <div class="form-group">
                    <label> Tax Rate: </label>
                    <input class="form-control input-sm" placeholder="Tax Rate" name="tax_rate" type="number" value="{{ $taxSlab->tax_rate }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <input  type="checkbox" name="remark" value="on_remaining_balance" {{ $taxSlab->remark == 'on_remaining_balance' ? 'checked="checked"' : '' }}> Slab will be on remaining balance  <br>
                </div>

                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Edit Tax Slab" />
                </div>

                <a href="{{ url("/admin/taxslab") }}" class="btn btn-primary form-control" >
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

