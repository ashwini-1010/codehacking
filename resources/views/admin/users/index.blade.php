@extends('layouts.admin')

@section('content')
	

	<h1>Users</h1>
	@if(Session::has('deleted_user'))
		<p class="bg-danger">{{session('deleted_user')}}</p>
	@endif
	 <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
    	@foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50X50'}}" height="50"></td>
        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role['name'] != null ? $user->role->name : 'User has no role'}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffforHumans()}}</td>
        <td>{{$user->updated_at->diffforHumans()}}</td>
        </tr>
        @endforeach 
    @endif
    </tbody>
	</table>
@endsection