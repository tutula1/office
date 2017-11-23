@extends('layout')

@section('content')


	<h1>{{ $role->name }}</h1>
	<hr>
	
	<p>{{ $role->description }}</p>
	<hr>
	
	@unless ($role->permissions->isEmpty())
		<p>Permissions:</p>
		<ul>
			@foreach ($role->permissions as $permission)
				<li><a href="{{ url('/permissions', $permission->id) }}">{{ $permission->description }}</a></li>
			@endforeach
		</ul>
	@endunless
	

@stop