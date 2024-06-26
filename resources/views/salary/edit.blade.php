@extends('layouts.adminlayout')
@section('title','Edit Salary')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Edit Salary </h3>
    <hr />

    <div class="col-md-8 col-md-offset-2">
        <form method="post" action="">
            <fieldset>
                {{ csrf_field() }} 
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" placeholder="Salary Name" name="name" type="text" value="{{ $salary->name }}" autocomplete="off" spellcheck="false" required />
                    </div>

                    <div class="form-group">
                        <label> Tax Limit 1 (percentage of basic salary)</label>    
                        <input class="form-control" placeholder="Tax Limit 1 (percentage of basic salary)" name="tax_limit1" type="number" value="{{ $salary->tax_limit1 }}" autocomplete="off" spellcheck="false" />
                    </div>

                    <div class="form-group">
                        <label> Tax Limit 2 </label>    
                        <input class="form-control" placeholder="Tax Limit 2" name="tax_limit2" type="number" value="{{ $salary->tax_limit2 }}" autocomplete="off" spellcheck="false" />
                    </div>

                    <div class="form-group">
                        <label> Tax Limit 3 </label>    
                        <input class="form-control" placeholder="Tax Limit 3" name="tax_limit3" type="number" value="{{ $salary->tax_limit3 }}" autocomplete="off" spellcheck="false" />
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label> Condition: </label>    
                        <select class="form-control"  name="condition" required >
                            <option value="100" {{ $salary->condition == '100' ? 'selected="selected"' : '' }}>Full 100%</option>
                            <option value="Lowest" {{ $salary->condition == 'Lowest' ? 'selected="selected"' : '' }}>Lowest Limit</option>
                            <option value="Tax_Free" {{ $salary->condition == 'Tax_Free' ? 'selected="selected"' : '' }}>Tax Exempted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Status: </label>
                        <select class="form-control"  name="status" required >
                            <option value="Active" {{ $salary->status == 'Active' ? 'selected="selected"' : '' }}>Active</option>
                            <option value="Deactive" {{ $salary->status == 'Deactive' ? 'selected="selected"' : '' }}>Deactive</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label> Type: </label>
                        <select class="form-control"  name="salary_type" required >
                            <option value="Monthly" {{ $salary->salary_type == 'Monthly' ? 'selected="selected"' : '' }}>Monthly</option>
                            <option value="Occasional" {{ $salary->salary_type == 'Occasional' ? 'selected="selected"' : '' }}>Occasional</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Update Salary" />
                    </div>

                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div>
                        <a href="{{ url("/admin/salary") }}" class="btn btn-primary form-control" >
                            Back to Salary Management
                        </a>

                    </div>

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
                </div>

            </fieldset>

        </form>

    </div>
</div>
@endsection
