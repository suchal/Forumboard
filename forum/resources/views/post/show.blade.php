@extends('layouts.app')

@section('title', $post->title);

@section('content')

<div class="container">
	<div class="row clearfix">
		<div class="col-md-10"><h1>{{ $post->title }}</h1></div>
		<div class="col-md-2">
			<div class="row">
				@can('edit', $post)
				<div class="col-xs-6">
					<a class="btn btn-default" href="/posts/{{ $post->getSlug() }}/edit">Edit</a>
				</div>

				<div class="col-xs-6">
					<form method="POST" action="/posts/{{ $post->getSlug() }}">
						{!! csrf_field() !!}
						{!! method_field('delete') !!}
						<button class="btn btn-danger" type="submit">Mark as Closed</button>
						
					</form>
				</div>
				@endcan

				@if (! $post->is_open)
					<button class="btn btn-danger" >Closed</button>
				@endif
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-6">
			<p>
				{{ $post->content }}
			</p>
		</div>	
		<div class="gallery col-md-6">
			@foreach ($photos->chunk(4) as $set)
			<div class="row">
				@foreach ($set as $photo)
				<div class="col-md-4">
				<a href="/{!! $photo->path !!}">
					<img src="/{!! $photo->thumbnail_path !!}" class="thumbnail gallery__photo">
				</a>
				</div>					
				@endforeach
			</div>
			@endforeach
			@can ('edit', $post)
			<div class="row">
				<form action="/posts/{{ $post->getSlug() }}/photos" class="dropzone" id="photos">
					{{ csrf_field() }}
				</form>
			</div>
			@endcan
		</div>	
	</div>	


	<hr>

	<div class="row">
	<div class="comments col-md-8 col-md-offset-2">
		<ul class="comments__list">			
			@foreach ($post->comments as $comment)
			<li class="comments__item clearfix">
				<div class="col-md-1">
				<a class="comments__user" href="/profile/{{ $post->user->username }}">{{ $comment->user->username }}</a>
				</div>
				<div class="col-md-10">
					{{ $comment->content }}
				</div>
				@can('destroy', $comment)
				<div class="col-md-1">
				<form method="POST" action="/comments/{{ $comment->id }}">
					{!! csrf_field() !!}
					{!! method_field('delete') !!}
					<button class="tiny_button comments_delete" type="submit"><svg version="1.1" class="fa-icon" role="presentation" width="12.571428571428571" height="16" viewbox="0 0 1408 1792">
          <path d="M512 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zM768 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zM1024 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zM480 384h448l-48-117q-7-9-17-11h-317q-10 2-17 11zM1408 416v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"></path>
        </svg>
        </button>
				</form>
				</div>
				@endcan
			</li>
			@endforeach
		</ul>
		@can ('comment', $post)
		<div class="row">
			<form class="form-horizontal" method="POST" action="/posts/{{ $post->getSlug() }}/comments">
				{!! csrf_field() !!}
				<label class="control-label" for="content">Comment: </label>
				<input class="form-control" type="text" name="content">
				<button type="submit">Send</button>
			</form>
		</div>
		@endcan
	</div>
	</div>

</div>
@stop
