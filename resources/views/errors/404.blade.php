<head>
    <title>Content Not Found</title>
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
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px" >                    
                    Employee Payroll                  
                </a>
            </div>
        </div>
    </nav>

    <br /> <br /> <br /> 

    <div class="container">
        <h2 class="text-center">
            Content Not Found
        </h2>
        <p class="text-center">
            Sorry - we haven’t been able to serve the page you asked for.</p>
        <hr />
        <p class="text-center">
            <a href="{{url()->previous()}}">Click Here</a> to go back
        </p>
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

