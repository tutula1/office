@extends('layout')

@section('content')

	<h1>Create a new Role</h1>
	
	<hr />
	
	{!! Form::model($role = new \App\Role, ['url' => 'roles']) !!}
	
		@include('roles.form', ['submitButtonText' =>  'Add Role'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop