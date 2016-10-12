@extends('layouts.app')

@section('title', 'Manage Types');

@section('content')
    <div class="container">
        <h2>List of all types</h2>
        <a class="btn btn-default"  href="/admin/types/create">Add a new Type</a>
        <ul class="list-group">
            @foreach ($types as $type)
            <li class="list-group-item">
            <h3>{{ $type->title }}</h3>
            <p>{{ $type->description }}</p>
            <div>                
            <form method="post" action="/admin/types/{{ $type->id }}">
                {!! csrf_field() !!}
                {!! method_field('delete') !!}
                <button class="btn btn-danger">delete</button>
            </form>
            </div>
            </li>
            @endforeach
        </ul>
    </div>
@stop