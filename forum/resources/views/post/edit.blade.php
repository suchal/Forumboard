@extends('layouts.app')

@section('title', 'Edit Post - '. $post->title)

@section('content')
	<div class="container">
		<div class="row">
		<h1>Create a new post</h1>
			<form method="POST" action="/posts/{{ $post->getSlug() }}">
			{!! csrf_field() !!}
			{!! method_field('patch') !!}
				<div class="form-group">
					<label class="control-label">Title</label>
					<input type="text" class="form-control" name="title" value="{{ $post->title }}">
				</div>
				<div class="form-group">
					<label class="control-label">Content</label>
					<textarea type="content" class="form-control" name="content">{{ $post->content }}</textarea>
				</div>

				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Type</label>
							<select name="type_id" class="form-control">
							@foreach ($types as $type)
								<option  {{ ($type->id == $post->type_id) ? "selected" : '' }} value="{{ $type->id }}">{{ $type->title }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">City</label>
							<select name="city_id" class="form-control">
							@foreach ($cities as $city)
								<option {{ ($city->id == $post->city_id) ? "selected" : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Category</label>
							<select name="category_id" class="form-control">
							@foreach ($categories as $category)
								<option {{ ($category->id == $post->category_id) ? "selected" : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
							@endforeach
							</select>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
						<label>
							<input type="checkbox" {{ ($post->is_open) ? "checked" : ""  }} name="reply_allowed">
							Allow other users to comment on your post?
						</label>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Update Post!</button>
				</div>
			</form>
		</div>
	</div>

	<ol>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ol>
@stop