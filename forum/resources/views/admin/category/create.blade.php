@extends('layouts.app')

@section('title', 'Add a new Category');

@section('content')
<div class="container">
    <ol>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ol>
    <form class="form-horizontal" enctype="multipart/form-data" action="/admin/categories" method="post">
        {!! csrf_field() !!}


        <div class="form-group">
            <label class="control-label" for="title">Title:</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <div class="warning">{{ $errors->title }}</div>
            @endif 
        </div>

        <div class="form-group">
            <label class="control-label" for="description">Description:</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <div class="warning">{{ $errors->description }}</div>
            @endif 
        </div>

        <div class="form-group">
            <label class="control-label" for="keywords">Keywords:</label>
            <input class="form-control" type="text" name="keywords" value="{{ old('keywords') }}">
            @if ($errors->has('keywords'))
                <div class="warning">{{ $errors->keywords }}</div>
            @endif 
        </div>

        <div class="form-group">
            <label class="control-label" for="icon">Icon:</label>
            <input class="form-control" type="file" name="icon">
            @if ($errors->has('icon'))
                <div class="warning">{{ $errors->icon }}</div>
            @endif 
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>
</div>
@stop