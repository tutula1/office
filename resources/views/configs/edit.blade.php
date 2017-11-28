@extends('layout')

@section('content')

	<h1>Edit: {!! $config->name !!}</h1>
	
	<hr />
	
	{!! Form::model($config, ['method' => 'PATCH', 'url' => 'configs/' . $config->id]) !!}
		
		@include('configs.form', ['submitButtonText' =>  'Update Config'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop