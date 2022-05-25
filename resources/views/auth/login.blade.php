<!DOCTYPE html>
<html lang="en">
<head>
	<title>Masuk</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
 
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('fonts')}}/font-awesome-4.7.0/css/font-awesome.min.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('fonts')}}/iconic/css/material-design-iconic-font.min.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animate/animate.css">
 	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/css-hamburgers/hamburgers.min.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animsition/css/animsition.min.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/select2/select2.min.css">
 	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/daterangepicker/daterangepicker.css">
 
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
 
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-26">{{ __('Kantin IT DEL') }}</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 " >
						<input class="input100"  id="nim" type="text" name="nim">
						<span class="focus-input100" data-placeholder="{{ __('NIM') }}"></span>
						@error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="wrap-input100 " >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" id="password" type="password" name="password">
						<span class="focus-input100" data-placeholder="Sandi"></span>

						@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Masuk
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Belum punya akun?
						</span>

						<a class="txt2" href="/register">
							Daftar
						</a>
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
 
	<script src="{{asset('js')}}/main.js"></script>

</body>
</html>