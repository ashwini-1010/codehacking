@extends('layouts.admin')

@section('content')
	
	<h1>Posts</h1>
	
	<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>         
        <th>Owner</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>        
      	<th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($posts)
    	@foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/50X50'}}" height="50"></td>
	    <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->body}}</a></td>               
        <td>{{$post->created_at->diffforHumans()}}</td>
        <td>{{$post->updated_at->diffforHumans()}}</td>
        </tr>
        @endforeach 
    @endif
    </tbody>
	</table>

@stop