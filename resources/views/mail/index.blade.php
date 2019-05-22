<!DOCTYPE html>
<html>
	<head>
		<title>Mail</title>
	</head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/libs.css')}}">
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">	
				
				<div class="card" style="height: auto;">
				
					<div class="card-body">
						<div class="card-header">
						<h3>Mail</h3>
						
					</div>
						
						<form method="POST" action="{{url('/mail')}}" accept-charset="UTF-8">
							<!-- <form method="POST" action="http://laravelquickpack.nom/login" accept-charset="UTF-8"> -->
							{!! csrf_field() !!}
							@if(Session::has('send_email'))
								<p style="color: red;">{{Session('send_email')}}</p>
							@endif
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-envelope" ></i></span>
								</div>
								
								<input id="email" type="text" class="form-control{{$errors->has('email')? ' is-invalid' : ''}}" name="email" placeholder="Email" autocomplete="email" autofocus>
							</div>
								
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="subject" class="form-control{{$errors->has('subject')? ' is-invalid' : ''}}" placeholder="subject">
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="textarea" name="message" class="form-control{{$errors->has('message')? ' is-invalid' : ''}}" placeholder="message" style="height: 100px;">
							</div>
								
							
							<div class="form-group text-center m-lg-1">
								<input type="submit" value="Send mail" class="btn login_btn">
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
		
		
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>