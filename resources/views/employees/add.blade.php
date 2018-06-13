@extends('layouts.adminlayout')
@section('title','Add New Employee')

@section('content')

<style>
    label{
        margin-top: 6px;
    }
</style>
<div class="row vertical-offset-100">
    <h3 class="text-center"> Add New Employee </h3>
    <hr />

    <form method="post" action="{{ url('admin/employee/add') }}">

        <fieldset class="form-group">
            <legend> Personal Info </legend>
            <div class="col-md-12">

                <div class="col-md-3">
                    <label> Employee ID: </label>
                    <input class="form-control input-sm" placeholder="Enter Employee ID" name="employee_id" type="text" value="{{ old('employee_id') }}" autocomplete="off" spellcheck="false" required />

                    <label> Mobile No: </label>
                    <input class="form-control input-sm" placeholder="Mobile No (Example:01841000000)" name="mobile_no" type="text" value="{{ old('mobile_no') }}" autocomplete="off" spellcheck="false" required />

                    <label> Designation: </label>
                    <input class="form-control input-sm" placeholder="Enter Designation" name="designation" type="text" value="{{ old('designation') }}" autocomplete="off" spellcheck="false" required />

                    <label> Date of Join: </label>;
                    <input class="form-control input-sm" placeholder="Date of Join" name="date_of_join" type="date" value="{{ old('date_of_join') }}"  required />

                    <label> Band:</label>
                    <input class="form-control input-sm" placeholder="Enter Band" name="band" type="text" value="{{ old('band') }}" autocomplete="off" spellcheck="false" />

                </div>

                <div class="col-md-3">
                    <label> Email ID: </label>
                    <input class="form-control input-sm" placeholder="Enter Email ID" name="email" type="text" value="{{ old('email') }}" autocomplete="off" spellcheck="false" required />

                    <label> First Name: </label>
                    <input class="form-control input-sm" placeholder="Enter First name" name="first_name" type="text" value="{{ old('first_name') }}" autocomplete="off" spellcheck="false" required />

                    <label> Department: </label>
                    <select class="form-control input-sm"  name="department_id" required >
                        @foreach($departments as $department)
                        <option value="{{$department->id}}" > {{$department->name}} </option>
                        @endforeach
                    </select>

                    <label> Date of Leave: </label>
                    <input class="form-control input-sm" placeholder="Date of Leave" name="date_of_leave" type="date" value="{{ old('date_of_leave') }}" />

                    <label> TIN:</label>
                    <input class="form-control input-sm" placeholder="Enter tin" name="tin" type="text" value="{{ old('tin') }}" autocomplete="off" spellcheck="false" />

                </div>


                <div class="col-md-3">

                    <label> Company Code: </label>
                    <select class="form-control input-sm" placeholder="Company Code" name="company_code">
                        <option value="Qubee">Qubee</option>
                        <option value="Qubee-C">Qubee-C</option>
                    </select>

                    <label> Last Name:</label>
                    <input class="form-control input-sm" placeholder="Enter Last Name" name="last_name" type="text" value="{{ old('last_name') }}" autocomplete="off" spellcheck="false" required />

                    <label> Sub Department: </label>
                    <select class="form-control input-sm"  name="sub_department_id" required >
                        @foreach($subDepartments as $subDepartment)
                        <option value="{{$subDepartment->id}}" > {{$subDepartment->name}} </option>
                        @endforeach
                    </select>

                    <label> Grade:</label>
                    <input class="form-control input-sm" placeholder="Enter Grade" name="grade" type="text" value="{{ old('grade') }}" autocomplete="off" spellcheck="false" />

                    <label> Level:</label>
                    <input class="form-control input-sm" placeholder="Enter Level" name="level" type="text" value="{{ old('level') }}" autocomplete="off" spellcheck="false" />


                </div>

                <div class="col-md-3">
                    <label> Status: </label>    
                    <select class="form-control input-sm"  name="status" required >
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>

                    <label> Category: </label>
                    <input class="form-control input-sm" placeholder="Enter Employee Category" name="category" type="text" value="{{ old('category') }}" autocomplete="off" spellcheck="false" required />

                    <label> Date of Birth: </label>
                    <input class="form-control input-sm" placeholder="Date of Birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}"  required />

                    <label> Step:</label>
                    <input class="form-control input-sm" placeholder="Enter Step" name="step" type="text" value="{{ old('step') }}" autocomplete="off" spellcheck="false" />

                    <label> Address:</label>
                    <input class="form-control input-sm" placeholder="Enter Present Address" name="address" type="text" value="{{ old('address') }}" autocomplete="off" spellcheck="false" />

                </div>
            </div>
        </fieldset>
        <br />
        <fieldset class="form-group">
            <legend>Login Information</legend>
            <div class="col-md-12">
                <div class="col-md-4">
                    <label> User ID:</label>
                    <input class="form-control input-sm" placeholder="User ID" name="user_id" type="text" value="{{ old('user_id') }}" autocomplete="off" spellcheck="false" required />

                </div>
                <div class="col-md-4">
                    <label> Password:</label>
                    <input class="form-control input-sm" placeholder="Password" name="password" type="password" required />
                </div>

                <div class="col-md-4">
                    <label> Password Confirmation:</label>
                    <input class="form-control input-sm" placeholder="Confirm Password" name="password_confirmation" type="password"  required />

                </div>
            </div>
        </fieldset> 
        <br />
        <fieldset class="form-group">
            <legend>Salary Information</legend>

            <div class="col-md-12" >
                <div class="col-md-4">
                    @php 
                      $index = 0;
                    @endphp
                    @foreach($salaries as $salary)
                    <div class="checkbox">
                        <label><input  type="checkbox" name="salaries[{{ $index }}][id]" value="{{ $salary->id }}" required = "{{ $salary->name == 'Basic' ? 'required' : '' }}" /><strong>{{ $salary->name }} </strong></label>
                    </div>
                    <div>
                        <input class="form-control" placeholder="Enter {{ $salary->name }} Amount " name="salaries[{{ $index }}][amount]" value="{{ old("salaries[".$index."][amount]") }}" type="number" {{ $salary->name == 'Basic' ? 'required' : '' }}  autocomplete="off" />
                    </div>
                    @php 
                      $index++;
                    @endphp
                    @endforeach
                </div> 
                <div class="col-md-2">
                    {{ csrf_field() }}
                </div>
                <div class="col-md-6">

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
            </div>
        </fieldset> 
        <br />
        <div class="col-md-12">
            <div class="col-md-2" ></div>
            <div class="col-md-4">
                <a href="{{ url("/admin/employee") }}" class="btn btn-primary form-control" >
                    Back to Employee Management
                </a> 
            </div>
            <div class="col-md-4">
                <input class="btn btn-success form-control" type="submit" value="Create New Employee" />
            </div>
            <div class="col-md-2" ></div>
        </div>

    </form>
    <br /><br /><br />
</div>
@endsection

