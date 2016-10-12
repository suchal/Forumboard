@extends('layouts.app')

@section('title', "Update the Terms and Financial Intermediation");

@section('content')

<div class="container">
    <h2>Update the Terms and Financial Intermediation</h2>
    <form class="form-horizontal" enctype="multipart/form-data" action="/admin/terms" method="post">
        {!! csrf_field() !!}
        {!! method_field('patch') !!}

        <div class="form-group">
            <label class="control-label" for="terms">Terms:</label>
            <textarea class="form-control" name="terms">{{ $terms['terms'] ?? '' }}</textarea>
            @if ($errors->has('terms'))
                <div class="warning">{{ $errors->terms }}</div>
            @endif 
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>

@stop