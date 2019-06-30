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

	<style type="text/css">
		html, body{
			background: none;
		}
	</style>
	<body>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-3 col-lg-6">
							{!! Form::open(['method'=>'POST', 'action'=>'CustomRegisterController@store']) !!}
							@csrf
							<div class="form-group">
								{!! Form::label('name', 'Name') !!}
								{!! Form::text('name', null, ['class'=>'form-control']) !!}
								@include('inc.error', ['field' => 'name'])
							</div>
							<div class="form-group">
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email', null, ['class'=>'form-control']) !!}
								@include('inc.error', ['field' => 'email'])
							</div>
							
							<div class="form-group">
								{!! Form::label('gender', 'Gender') !!}
								{!! Form::radio('gender', 'male',  (old('sex') == 'male') ? true : '')!!} Male
								{!! Form::radio('gender', 'female', (old('sex') == 'female') ? true : '' )!!} Female
								@include('inc.error', ['field' => 'gender'])
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Password') !!}
								{!! Form::password('password', ['class'=>'form-control']) !!}
								@include('inc.error', ['field' => 'password'])
							</div>
							<div class="form-group">
								{!! Form::label('password_confirm', 'Confirm Password') !!}
								{!! Form::password('password_confirm', ['class'=>'form-control']) !!}
								@include('inc.error', ['field' => 'password_confirm'])
							</div>
						
							<div class="form-group">
								{!! Form::submit('Sign Up', ['class'=>'btn btn-primary']) !!}
							</div>
						{!! Form::close() !!}
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>