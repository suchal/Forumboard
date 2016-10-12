@extends('layouts.app')

@section('title', 'Add a new Type');

@section('content')
<div class="container">
    
    <form class="form-horizontal" action="/admin/types" method="post">
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

        <button class="btn btn-primary" type="submit">Add</button>

    </form>
</div>
@stop