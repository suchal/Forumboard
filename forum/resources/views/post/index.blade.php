@extends('layouts.app')

@section('title', "All Posts");

@section('content')

<div class="container">
	<table class="table table-striped">
	    <thead>
	        <tr>
	            <th>Category</th>
	            <th>Title</th>
	            <th>Username</th>
	            <th>Type</th>
	            <th>City</th>
	            <th>Since</th>
	        </tr>
	    </thead>
	    <tbody>
			@foreach($posts as $post)
	        <tr>
	            <td>
	            	<img src="{{ $post->category->icon_path }}" width="70px">
	            	{{ $post->category->title }}
	            </td>
	            <td>
	            	@if($post->is_sticky) <i class="fa fa-thumb-tack" aria-hidden="true"></i> @endif
	            	<a href="/posts/{{ $post->getSlug() }}">{{ $post->title }}</a>
	            </td>
	            <td>{{ $post->user->username }}</td>
	            <td>{{ $post->type->title }}</td>
	            <td>{{ $post->city->name }}</td>
	            <td>{{ $post->updated_at }}</td>
	        </tr>
			@endforeach
	    </tbody>
	</table>
	{!! $posts->links() !!}
</div>

@stop