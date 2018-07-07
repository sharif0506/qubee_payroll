@extends('layouts.adminlayout')
@section('title','Edit Tax Rebate Slab')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Edit Tax Rebate Slab </h3>
    <hr />

    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="">
            <fieldset>
                {{ csrf_field() }} 
                <div class="form-group">
                    <label> Slab Order: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Order" name="slab_order" type="number" value="{{ $taxRebateSlab->slab_order }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Amount: </label>
                    <input class="form-control input-sm" placeholder="Tax Slab Amount" name="amount" type="number" value="{{ $taxRebateSlab->amount }}" autocomplete="off" spellcheck="false" required />
                </div>

                <div class="form-group">
                    <label> Tax Rebate Rate: </label>
                    <input class="form-control input-sm" placeholder="Tax Rate" name="rebate_rate" type="number" value="{{ $taxRebateSlab->rebate_rate }}" autocomplete="off" spellcheck="false" required />
                </div>
                
                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" value="Edit Tax Rebate Slab" />
                </div>

                <a href="{{ url("/admin/taxrebateslab") }}" class="btn btn-primary form-control" >
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

