<!DOCTYPE html>
<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.PNG')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:lightsteelblue">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" >                    
                    <img style="max-width:75px;margin-top: -2px " src="{{asset('images/logo.jpg')}}" />                    
                </a>
                <a class="navbar-brand" href="{{ url('/admin/login') }}" style="font-size: 20px" >                    
                    Payroll Admin                 
                </a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                        <li><a href="{{url('/admin/payroll') }}">Payroll Generate</a></li>                       
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Financial Info
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/admin/salary') }}"> Salary Management </a></li>
                                <li><a href="{{  url('/admin/deduction') }}"> Deduction Manage </a></li>
                                <li><a href="{{  url('/admin/taxslab') }}"> Manage Income Tax </a> </li>
                                <li><a href="{{  url('/admin/taxrebateslab') }}"> Manage Tax Rebate </a> </li>
                            </ul>
                        </li>
                       
                        <li><a href="{{url('/admin/employee') }}">Manage Employee</a></li>                       
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                App Setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/admin/user') }}">User Management</a></li>
                                <li><a href="{{  url('/admin/department') }}">Manage Departmant</a></li>
                                <li><a href="{{  url('/admin/subdepartment') }}">Manage Sub-department</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/logout') }}">Logout</a></li>                       
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <br /> <br /> 

    <div class="container">
        @yield('content') 
    </div>

    <br /> <br /> <br />
     <footer class="container-fluid text-center navbar-fixed-bottom" style="background-color: lightsteelblue;">
        <div style="margin-top:10px;">
            <h5>
                Qubee © {{date("Y")}}, All Rights Reserved 
                <br />
                Powered By - IT & Billing
            </h5>
        </div>
    </footer>     

</body>

</html>

