<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<!--Made with love by Mutiullah Samim -->
		
		<!--Bootsrap 4 CDN-->
		
		
		<!--Fontawesome CDN-->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/libs.css')}}">
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				
				<div class="card" style="height: auto;">
					<div class="card-header">
						<h3>Sign In</h3>
						<div
							class="fb-like"
							data-share="true"
							data-width="450"
							data-show-faces="true">
						</div>
						<div class="d-flex justify-content-end social_icon">
							<a href="{{url('login/facebook')}}"><span><i class="fab fa-facebook-square"></i></span></a>
							<span><i class="fab fa-google-plus-square"></i></span>
							<span><i class="fab fa-twitter-square"></i></span>
						</div>
					</div>
					<div class="card-body">
						
						
						<form method="POST" action="{{route('login')}}" accept-charset="UTF-8">
							<!-- <form method="POST" action="http://laravelquickpack.nom/login" accept-charset="UTF-8"> -->
							{!! csrf_field() !!}
							@if(Session::has('registration_success'))
							<p style="color: #ddd;">{{Session('registration_success')}}</p>
							@endif
							@if(Session::has('danger'))
							<p style="color: red;">{{Session('danger')}}</p>
							@endif
							@if(Session::has('wrong_password'))
							<p style="color: red;">{{Session('wrong_password')}}</p>
							@endif
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-envelope"></i></span>
								</div>
								
								<input id="email" type="text" class="form-control" name="email" placeholder="Email/Username" autocomplete="email" autofocus>
							</div>
							@include('inc.error', ['field' => 'email'])
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="password">
							</div>
							@include('inc.error', ['field' => 'password'])
							<div class="row align-items-center remember">
								<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
							</div>
							<div class="form-group text-center m-lg-1">
								<input type="submit" value="Login" class="btn login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Don't have an account?<a href="{{route('register')}}">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center">
							@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}">Forgot your password?</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script>
		window.fbAsyncInit = function() {
		FB.init({
		appId      : '2272263139529736',
		xfbml      : true,
		version    : 'v3.3'
		});
		FB.AppEvents.logPageView();
		};
		(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>