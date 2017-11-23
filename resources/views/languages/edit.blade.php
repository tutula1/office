@extends('layout')

@section('content')

	<h1>Edit: {!! $language->name !!}</h1>
	
	<hr />
	
	{!! Form::model($language, ['method' => 'PATCH', 'url' => 'languages/' . $language->id]) !!}
		
		@include('languages.form', ['submitButtonText' =>  'Update Language'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop