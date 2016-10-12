@extends('layouts.app')

@section('title', 'Search Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-inline" method="GET" action="">
                {!! csrf_field() !!}
                <input type="text" class="form-control" name="query" value="{{ $query??'' }}">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
            </div>
        </div>
        @if (count($results))
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
            @foreach($results as $post)
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
    @endif
    </div>
@stop