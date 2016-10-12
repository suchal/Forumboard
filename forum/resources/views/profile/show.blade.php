@extends('layouts.app')

@section('title',  $user->username  . "'s profile");

@section('content')
<div class="container">
<div class="bg-success">
  <div class="profile">
  <h2>{{ $user->username }} <span class="verfiy"><i class="fa fa-check-circle" aria-hidden="true"></i></span></h2>
<p></p>
<div class="post-info">
<span>since : $user->created_at</span>
</div>
</div>
</div>


<div class="post" style="text-align:center;">
  <h4>{{ $user->bio }}</h4>
  <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->city->name ?? 'unknown' }}
  <div class="rat">
  <div class="row">
  <div class="col-md-6"><i class="fa fa-smile-o" aria-hidden="true"></i> 23.1K</div>
  <div class="col-md-6"><i class="fa fa-frown-o" aria-hidden="true"></i> 327</div>
</div>
</div>
<div class="share">
  <div class="row">
  <div class="col-xs-6">
  	<a class="btn btn-default" href="/messages/{{ $user->username }}/">
	  	<i class="fa fa-envelope" aria-hidden="true"></i> Private Messages</div>
  	</a>
  	@if($user->show_phone_number)
  	<div class="col-xs-6">
  	<i class="fa fa-phone" aria-hidden="true"></i> {{ $user->phone_number ?? 'Contact'}} 
  	</div>
  	@endif
  </div></div>
</div>

  <div class="tblpost">
<table class="table table-striped">
  <thead>
    <tr>
      <th style="width: 80px;">Category</th>
      <th>Title</th>
      <th>Type</th>
      <th>Citis</th>
      <th>Since</th>
    </tr>
  </thead>
  <tbody>
	@foreach($user->posts as $post)
    <tr>
      <td></td>
      <td>
	      <h4>
	      		@if($post->is_sticky)<i class="fa fa-thumb-tack" aria-hidden="true"></i> @endif 
	      		{{ $post->title }}
	      </h4>
      </td>
      <td>{{ $post->type->title }}</td>
      <td>{{ $post->city->name }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
	@endforeach

  </tbody>
</table>
</div>

</div>
@stop