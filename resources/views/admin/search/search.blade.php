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
		<div class="container">
			<div class="row">
		@foreach($user as $searchUser)
				<div class="col-md-6 offset-md-3 text-center">
		
					<a href="{{route('admin.profile', $searchUser->id)}}"><h2>Name : {{$searchUser->name}}</h2></a>
					<img class="mt-4" height="200px" width="300px" src="{{isset($searchUser->photo->file)?$searchUser->photo->file:'http://placehold.it/200x300'}}">
					<h4 class="mt-4">Working Day: {{$searchUser->day}}</h4>
					<hr>
				</div>
		@endforeach
			</div>
		</div>
		
		
		
		
		@endif
		
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
	</body>
</html>