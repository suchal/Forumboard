@extends('layouts.app')

@section('title', 'Add a new City');

@section('content')
<div class="container">
    
    <form class="form-horizontal" action="/admin/cities" method="post">
        {!! csrf_field() !!}


        <div class="form-group">
            <label class="control-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name">
            @if ($errors->has('name'))
                <div class="warning">{{ $errors->name }}</div>
            @endif 
        </div>

        <button class="btn btn-primary" type="submit">Add</button>


    </form>
</div>
@stop