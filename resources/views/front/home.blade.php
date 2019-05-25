<!DOCTYPE html>
<html>
	<head>
		<title>home</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/libs.css')}}">
	</head>
	<body>
		
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
							<a class="navbar-brand" href="#">Blog</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav">
									<li class="nav-item active">
										<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Blog</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{route('mail')}}">Contact</a>
									</li>
									@if(Auth::check())
									<li class="nav-item">
										<a class="nav-link" href="{{route('logout')}}">Logout</a>
									</li>
									@else
									<li class="nav-item">
										<a class="nav-link" href="{{route('login')}}">Login</a>
									</li>
								@endif
									@if(Auth::user())
										<a style="position: absolute; right: 0;" class="nav-link float-right">
										Welcome ! {{Auth::user()->name}}
										<img class="rounded-circle" width="30px" height="30px" src="{{Auth::user()->photo?Auth::user()->photo->file:'http://placehold.it/200x200'}}">
										</a>
									@endif
								
									
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>