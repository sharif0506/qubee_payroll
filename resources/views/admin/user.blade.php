@extends('layouts.adminlayout')
@section('title','User Management')

@section('content')
<div class="row vertical-offset-100">
    <h3 class="text-center">User Management</h3>
    <hr />

    <div class="col-sm-3">
        <a href="#" class="btn btn-primary form-control" role="button"><i class="fas fa-plus-circle"></i> Add a System User</a>
    </div>


    <br /><br /><br />
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead >
                <tr>
                    <th class="text-center">Serial</th>
                    <th class="text-center">User ID</th>
                    <th class="text-center">Employee ID</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Operation</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td>{{$user->id}}</td>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->employee_id}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        @if(Auth::user()->user_id != $user->user_id) 
                            <a href="#" class="btn btn-warning" role="button"> deactivate </a>
                            <a href="#" class="btn btn-danger" role="button"> delete </a>
                        @endif   
                    </td>
                </tr>
                @endforeach

            </tbody>


        </table>
    </div>

</div>
@endsection

