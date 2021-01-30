   
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/loginpartials/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('/pics/background2.jpg');">
            <div class="wrap-login100">

                <form action="login" method="post" autocomplete="off" class="login100-form validate-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="login100-form-logo">
                        <img style="width: 100px; height: 100px; border-radius: 50%;" src="{{URL('/pics/Dsf.png')}}">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <div class="wrap-input100 validate-input">					
                        <select class="mdb-select md-form" name="Role" class="form-control" style="width: 395px;">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1" name="sadmin">Owner/CEO</option>
                            <option value="2" name="admin">Admin</option>
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "User ID">
                        <input class="input100" type="text" name="ID" placeholder="User ID">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="Password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    @if($errors->all())
                    <div align="center" class="alert alert-secondary">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button  type="submit" name="submit" value="Login" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-90">
                        <a class="txt1" href="#">
                            Copyright © UOL FYP Group
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{URL::asset('/loginpartials/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('/loginpartials/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('/loginpartials/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{URL::asset('js/main.js')}}"></script>

</body>
</html>
