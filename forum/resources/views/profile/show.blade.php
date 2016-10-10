@extends('layouts.app')

@section('title',  $user->username  . "'s profile");

@section('content')
	<div class="container">
		<div class="panel panel-default">
		  <div class="panel-body">
		  	<div class="col-md-4">
		  		<ul class="list-group">
		  		<li class="list-group-item">Username: {{ $user->username }}</li>
		  		<li class="list-group-item">Email: {{ $user->username }}</li>
		  		<li class="list-group-item">City: {{ $user->city->name ?? 'none' }}</li>
		  		<li class="list-group-item">User Since: {{ $user->created_at }}</li>
		  		</ul>
		  	</div>

		  	<div class="col-md-8">
		  	<h2>Bio</h2>
		  		{{ $user->bio }}
		  	</div>
		  </div>
		</div>
	</div>
@stop