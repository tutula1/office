@extends('layout')

@section('content')

	<h1>Edit: {!! $role->name !!}</h1>
	
	<hr />
	
	{!! Form::model($role, ['method' => 'PATCH', 'url' => 'roles/' . $role->id]) !!}
		
		@include('roles.form', ['submitButtonText' =>  'Update Role'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop