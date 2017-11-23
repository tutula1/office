@extends('layout')

@section('content')

	<h1>Edit: {!! $permission->name !!}</h1>
	
	<hr />
	
	{!! Form::model($permission, ['method' => 'PATCH', 'url' => 'permissions/' . $permission->id]) !!}
		
		@include('permissions.form', ['submitButtonText' =>  'Update Permission'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop