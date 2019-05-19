@extends('layouts.admin')

@section('title')
    <i class="fa fa-users"></i>Users
@endsection
@section('content')

<table class="table table-striped " style="color: #000;">

  


  <thead>
    <tr class="" style="background-color: #4268D6; color: #FFF4F5;">
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Holiday</th>
      
      <th scope="col">Today's Status</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $i=>$user)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td><img height="50px" width="50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/200x200'}}"></td>
      
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{ucfirst($user->role->name)}}</td>
      <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
      
           <?php
              $offday = (explode(',', $user->day));
              $diff = array_diff($working_days, $offday);
              $imp = implode(', ', $diff);
            ?>
            <td>{{($imp)}}</td>    
          <td>
             {{(stripos($imp, $today) !== false) ? 'Holiday' : 'Working day'}}
          </td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>
      <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
             <i class="fas fa-edit"></i>
          </span>
          <span class="text">Edit</span>
          </a>
      </td>
    </tr>
    
    @endforeach
    
    
  </tbody>
</table>



@endsection