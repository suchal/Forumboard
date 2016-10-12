@extends('layouts.app')

@section('title', 'Create a new post')


@section('content')
	<div class="container">
		<div class="row">
		<h1>Create a new post</h1>
			
			<form method="POST" action="/posts">
			{!! csrf_field() !!}
				<div class="form-group">
					<label class="control-label">Title</label>
					<input type="text" class="form-control" name="title" value="{{ old('title') }}">
				</div>
				<div class="form-group">
					<label class="control-label">Content</label>
					<textarea type="content" class="form-control" name="content">{{ old('content') }}</textarea>
				</div>

				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Type</label>
							<select name="type_id" class="form-control">
							@foreach ($types as $type)
								<option value="{{ $type->id }}">{{ $type->title }}</option>
							@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Category</label>
							<select name="category_id" class="form-control">
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->title }}</option>
							@endforeach
							</select>
						</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">City</label>
						<select name="city_id" class="form-control">
						@foreach ($cities as $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
						@endforeach
						</select>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label>
							<input type="checkbox" checked="checked" name="reply_allowed">
							Allow other users to comment on your post?
						</label>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Post!</button>
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