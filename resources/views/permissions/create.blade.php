@extends('layout')

@section('content')

	<h1>Create a new Permission</h1>
	
	<hr />
	
	{!! Form::open(['url' => 'permissions']) !!}
	
		@include('permissions.form', ['submitButtonText' =>  'Add Permission'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop