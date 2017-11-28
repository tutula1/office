@extends('layout')

@section('content')

	<h1>Create a new Config</h1>
	
	<hr />
	
	{!! Form::model($config = new \App\Config, ['url' => 'configs']) !!}
	
		@include('configs.form', ['submitButtonText' =>  'Add Config'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop