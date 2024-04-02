<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masuk</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts') }}/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts') }}/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/main.css">

</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('loginn') }}">

                    @csrf
                    <span class="login100-form-title p-b-26">{{ __('Learning Management System') }}</span>
                    <span class="login100-form-title p-b-48">

                    </span>

                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="wrap-input100 ">
                        <input class="input100" id="email" type="text" name="email"
                            placeholder="{{ __('EMAIL') }}">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 ">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" id="password" type="password" name="password"
                            placeholder="{{ __('Kata Sandi') }}">
                        <span class="focus-input100"></span>


                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Masuk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/countdowntime/countdowntime.js"></script>

    <script src="{{ asset('js') }}/main.js"></script>

</body>

</html>
