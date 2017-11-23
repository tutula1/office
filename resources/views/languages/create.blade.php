@extends('layout')

@section('content')

	<h1>Create a new Language</h1>
	
	<hr />
	
	{!! Form::open(['url' => 'languages']) !!}
	
		@include('languages.form', ['submitButtonText' =>  'Add Language'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop