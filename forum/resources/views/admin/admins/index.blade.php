@extends('layouts.app')

@section('title', 'Manage Admins');

@section('content')
<div class="container">
    <h2>Manage Admins</h2>
    <a href="/admin/admins/create" class="btn btn-default">Add</a>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Since</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>
                    <a href="/admin/admins/{{ $admin->username }}/edit" class="btn btn-default">Edit</a>
                    <form action="/admin/admins/{{ $admin->username }}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('delete') !!}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
            </tbody>
    </table>
</div>
@stop