@extends('layouts.app')

@section('title', 'Manage Categories');

@section('content')
    <div class="container">
        <h2>List of all Categories</h2>
        <a class="btn btn-default"  href="/admin/categories/create">Add a new Category</a>
        <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item">
            <img width="50px height="50" src="/{{ $category->icon_path }}"> 
            <h3>{{ $category->title }}</h3>
            <p>{{ $category->description }}</p>

            <div>                
            <form method="post" action="/admin/categories/{{ $category->id }}">
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