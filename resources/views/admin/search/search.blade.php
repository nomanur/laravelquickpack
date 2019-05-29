<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/libs.css')}}">
	</head>
	<body style="background-image: none;">
		@if(count($user) == 0)
		<div class="text-center">
  			<h2>No user Found</h2>
		</div>
		@else
		@foreach($user as $searchUser)
		
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<a href="{{route('admin.profile', $searchUser->id)}}"><h2>Name : {{$searchUser->name}}</h2></a>
					<img class="mt-4" height="200px" width="300px" src="{{$searchUser->photo->file}}">
					<h4 class="mt-4">Working Day: {{$searchUser->day}}</h4>
				</div>
			</div>
		</div>
		
		
		
		
		@endforeach
		@endif
		
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>