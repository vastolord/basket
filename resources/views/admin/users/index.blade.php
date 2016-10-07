@extends('layouts.admin')



@section('intro')

	Users

@stop

@section('content')

<div class="container">
  <h2>Contextual Classes</h2>
  <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @php
	settype($count,"integer");
	$count=1;
	$pick=0;
	$clch = array("success","info");
	@endphp
    @if($users)
     @foreach($users as $user)
      	@php
      	$pick=floor($count/2);
    	@endphp
      <tr class="{{$clch[$pick]}}">
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>      				
        <td>{{$user->created_at->diffForHumans()}}</td>      				
        <td>{{$user->updated_at->diffForHumans()}}</td>      				
      </tr>
  		@php
  		$count++;
  		@endphp
      @endforeach
	@endif
    </tbody>
  </table>

@stop
