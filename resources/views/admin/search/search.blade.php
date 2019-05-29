@if(count($user) == 0)
	<h2>No user found</h2>
@else
@foreach($user as $searchUser)
	
	
	{{$searchUser->name}}
	

@endforeach
@endif