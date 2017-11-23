@extends('layout')

@section('content')

	<h1>Edit: {!! $user->name !!}</h1>
	
	<hr />
	
	{!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/' . $user->id]) !!}
		
		@include('users.form', ['submitButtonText' =>  'Update User'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop