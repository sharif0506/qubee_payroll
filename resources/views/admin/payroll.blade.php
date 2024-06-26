@extends('layouts.adminlayout')
@section('title','Admin Panel')

@section('content')
<br />
<div class="row vertical-offset-100">
    <h2>Payroll Generate</h2>
    <hr />

    <form method="post" action="{{url("/admin/payroll")}}" enctype="multipart/form-data" >

        <div class="form-group">
            <div class="col-md-3" >
                <label>Income Year:</label>
                <select class="form-control" name="income_year">
                    <option value="2018-2019">2018-2019</option>
                    <option value="2019-2020">2019-2020</option>
                    <option value="2020-2021">2020-2021</option>
                </select>
            </div>

            <div class="col-md-3" >
                <label >Month:</label>
                <select class="form-control" name="month">
                    <!--                    <option value=""></option>-->
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>

            <div class="col-md-3" >
                <label>Upload Additional Income File:</label>
                <input type="file" class="form-control" name="additional_file" />
            </div>

            <div class="col-md-3" >
                <label>Upload Deduction File:</label>
                <input type="file" class="form-control" name="deduction_file" />
            </div>

            {{ csrf_field() }} 
            <br /><br /><br /><br />

            <div class="row" >
                <div class="col-md-3">
                    <button class="btn btn-success form-control" type="submit" name="generate_payroll" onclick="return confirm('Are you sure you want to generate payroll?');" > 
                        Generate Payroll
                    </button>
                </div>

            </div>

        </div>

    </form>
    @if(session("message"))
    <div class="alert alert-success">
        <ul>
            <li>{{ session("message") }}</li>
        </ul>
    </div>
    @endif
    @if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection

