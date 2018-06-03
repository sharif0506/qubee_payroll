<!DOCTYPE html>
<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.PNG')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px" >                    
                    Employee Payroll                  
                </a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::guard('employees')->check())
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                        @endif

                        @if(!Auth::guard('employees')->check())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/registration') }}">Registration</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <br /> <br /> <br /> 

    <div class="container">
        <div class="row vertical-offset-100">
            @if(Auth::guard('employees')->check())
            <div class="col-md-3">
                <br />
                <div class="list-group">
                    <h4 class="list-group-item text-center">Md. Sharifur Rahman</h4>
                    <!--<h4 class="list-group-item">Sharif</h4>-->
                    <a href="{{ url('/home') }}" class="list-group-item"> <i class="glyphicon glyphicon-home"> </i> <strong> Home </strong></a>
                    <a href="{{ url('/change/username') }}" class="list-group-item"><i class="glyphicon glyphicon-user"> </i><strong> Change User Name </strong></a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-lock"> </i><strong> Change Password </strong></a>
                    <a href="{{ url('/change/mobile') }}" class="list-group-item"><i class="glyphicon glyphicon-phone"> </i><strong> Update Mobile No </strong></a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-envelope"> </i><strong> Contact Us </strong></a>
                    <a href="{{ url('/logout') }}" class="list-group-item"><i class="glyphicon glyphicon-log-out"> </i><strong> Logout </strong></a>
                </div>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-8">  
                @endif
                @yield('content')
            </div>

        </div>
    </div>

    <br /> <br />
    <footer class="container-fluid text-center navbar-fixed-bottom" style="background-color: lightsteelblue;">
        <div style="margin-top:15px;">
            <p>
                Qubee © 2018, All Rights Reserved
            </p>                           
        </div>
    </footer>    

</body>

</html>

