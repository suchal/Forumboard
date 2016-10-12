@extends('layouts.app')

@section('title', 'Manage Cities');

@section('content')
    <div class="container">
        <h2>List of all cities</h2>
        <a class="btn btn-default"  href="/admin/cities/create">Add a new City</a>
        <ul class="list-group">
            @foreach ($cities as $city)
            <li class="list-group-item">
            {{ $city->name }}
            <div>                
            <form method="post" action="/admin/cities/{{ $city->id }}">
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