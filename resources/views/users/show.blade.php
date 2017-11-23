@extends('layout')

@section('content')


	<h1>{{ $user->name }}</h1>
	<hr>
	
	<p>{{ $user->role->name }}</p>
	<hr>
	
	@unless ($user->role->permissions->isEmpty())
	
		<p>Permissions:</p>
		<ul>
			@foreach ($user->role->permissions as $permission)
				<li><a href="{{ url('/permissions', $permission->id) }}">{{ $permission->name }}</a></li>
			@endforeach
		</ul>
	@endunless
	

@stop