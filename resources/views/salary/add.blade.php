@extends('layouts.adminlayout')
@section('title','Add Salary')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center"> Add Salary </h3>
    <hr />

    <div class="col-md-8 col-md-offset-2">
        <form method="post" action="{{ url('admin/salary/add') }}">
            <fieldset>
                {{ csrf_field() }} 
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" placeholder="Salary Name" name="name" type="text" value="{{ old('name') }}" autocomplete="off" spellcheck="false" required />
                    </div>

                    <div class="form-group">
                        <!--<label> Tax Limit 1 </label>-->    
                        <input class="form-control" placeholder="Tax Limit 1 (percentage of basic salary)" name="tax_limit1" type="text" value="{{ old('tax_limit1') }}" autocomplete="off" spellcheck="false" />
                    </div>

                    <div class="form-group">
                        <!--<label> Tax Limit 2 </label>-->    
                        <input class="form-control" placeholder="Tax Limit 2" name="tax_limit2" type="text" value="{{ old('tax_limit2') }}" autocomplete="off" spellcheck="false" />
                    </div>

                    <div class="form-group">
                        <!--<label> Tax Limit 3 </label>-->    
                        <input class="form-control" placeholder="Tax Limit 3" name="tax_limit3" type="text" value="{{ old('tax_limit3') }}" autocomplete="off" spellcheck="false" />
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label> Rule: </label>    
                        <select class="form-control"  name="condition" required >
                            <option value="100%">Full 100%</option>
                            <option value="lowest">Lowest Limit</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Status: </label>    
                        <select class="form-control"  name="status" required >
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Add Salary" />
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

