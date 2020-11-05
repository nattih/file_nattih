<!DOCTYPE html>
<html lang="en">
<head>
	<title>Espace membre</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('auth/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="mt-2">
					@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				   @endif
				</div>
				<div class="login100-form-title" style="background-image:url(auth/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Se connecter
					</span>
				</div>

				<form method="POST" action="{{ route('login')}}" class="login100-form validate-form">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="le mail est obligatoire">
						<span class="label-input100">Email</span>
						<input id="email" class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password est obligatoire">
						<span class="label-input100">Password</span>
						<input id="password" class="input100 @error('password') is-invalid @enderror" name="password" type="password" name="pass" placeholder="Entrez votre password">
						@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" type="checkbox" name="remember" id="ckb1" id="remember ckb1" {{ old('remember') ? 'checked' : '' }} >
							<label class="label-checkbox100" for="ckb1">
								{{ __('Souvenir de moi') }}
							</label>
						</div>

						<div>
							@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}" class="txt1">
								P{{ __('assword oublié?') }}
							</a>
							@endif
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}" defer></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('auth/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/js/main.js')}}"></script>

</body>
</html>
