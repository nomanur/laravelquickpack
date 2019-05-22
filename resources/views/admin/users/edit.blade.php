@extends('layouts.admin')
@section('title')
<i class="fa fa-edit"></i>Edit User
@include('message', [
'message'=>'',
])
@endsection


@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<img class="rounded-circle" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/200x200'}}" width="150" height="150">
		</div>
		
		<!-- form -->
		<div class="col-lg-6">
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
			<hr>
			<div class="form-group">
				{!! Form::label('day', 'Uncheck the offday') !!}
				<hr>
			@foreach ( $working_days as $i => $working_day )
				{!! Form::checkbox( 'working_days[]',$working_day,in_array($i,$saved_working_days),['class' => '', 'id' => $working_day]) !!}
				{!! Form::label($working_day,  ucfirst($working_day)) !!}
			@endforeach
		</div>
			<hr>
			<!-- <div class="form-group">
				{!! Form::checkbox('activator',null,null, ['class'=>'']) !!}
				{!! Form::label('activator', 'Click here to agree') !!}
				@include('inc.error', ['field' => 'activator'])
			</div> -->

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						{!! Form::submit('Update User', ['class'=>'btn btn-primary w-100']) !!}
					</div>
				</div>
			{!! Form::close() !!}
				<div class="col-lg-6">

					{!! Form::model($user, ['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
					
					<div class="form-group">
						{!! Form::submit('Delete User', ['class'=>'btn btn-danger w-100']) !!}
					</div>
						
					{!! Form::close() !!}

				</div>
			</div>
		</div>
		
		<!-- form -->
		<div class="col-lg-3">
			<div class="card" style="width: 15rem;">
					<img src="http://placehold.it/400x200" class="card-img-top" alt="...">
					<div class="card-body create-card">
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