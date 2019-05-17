@extends('layouts.admin')
@section('title')
	<i class="fab fa-creative-commons-by"></i>Create User 
	@include('message', [
		'message'=>'',
	])
	
@endsection


@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<img class="rounded-circle" src="http://placehold.it/150x150">			
		</div>
		
		<!-- form -->
		<div class="col-lg-6">
			{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
			@csrf
			<div class="form-group">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class'=>"form-control"]) !!}
				@include('inc.error', ['field' => 'name'])
			</div>
			<div class="form-group">
				{!! Form::label('email', 'email') !!}
				{!! Form::text('email', null, ['class'=>'form-control']) !!}
				@include('inc.error', ['field' => 'email'])
			</div>
			<div class="form-group">
				{!! Form::label('role_id', 'Roles') !!}
				{!! Form::select('role_id',[''=>'Select Options'] + array_map('ucfirst',$role), null, ['class'=>'form-control']) !!}
				@include('inc.error', ['field' => 'role_id'])
			</div>
			<div class="form-group">
				{!! Form::label('is_active', 'Status') !!}
				{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 1, ['class'=>'form-control']) !!}
				@include('inc.error', ['field' => 'is_active'])
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
				@include('inc.error', ['field' => 'photo_id'])
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
			<hr>
				<div class="form-group">
					{!! Form::label('', 'Uncheck the off Day') !!}
					<br>
					{!! Form::label('saturday', 'saturday') !!}
					{!! Form::checkbox('day[sat]', 0, ['class'=>'form-control']) !!}
					{!! Form::label('sunday', 'sunday') !!}
					{!! Form::checkbox('day[sun]', 1, ['class'=>'form-control']) !!}
					{!! Form::label('monday', 'monday') !!}
					{!! Form::checkbox('day[mon]', 2, ['class'=>'form-control']) !!}
					{!! Form::label('tuesday', 'tuesday') !!}
					{!! Form::checkbox('day[tue]', 3, ['class'=>'form-control']) !!}
					{!! Form::label('wednesday', 'wednesday') !!}
					{!! Form::checkbox('day[wed]', 4, ['class'=>'form-control']) !!}
					{!! Form::label('thursday', 'thursday') !!}
					{!! Form::checkbox('day[thu]', 5, ['class'=>'form-control']) !!}
					{!! Form::label('friday', 'friday') !!}
					{!! Form::checkbox('day[fri]', 6, ['class'=>'form-control']) !!}
				</div>
				<hr>
			<div class="form-group">
				{!! Form::checkbox('activator',null,null, ['class'=>'']) !!}
				{!! Form::label('activator', 'Click here to agree') !!}
				@include('inc.error', ['field' => 'activator'])
			</div>
			<div class="form-group">
				{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		
		<!-- form -->
		<div class="col-lg-3">
			<div class="card" style="width: 15rem;">
				<img src="http://placehold.it/400x200" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Tips</h5>
					<p class="card-text">
						<ul>
							<li><b>Name</b> cannot be less than 2 characters</li>
							<li><b>Password</b> cannot be less than 6 characters</li>
						</ul>
					</p>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection