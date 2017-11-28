@extends('layout')

@section('content')


	<h1>{{ $config->key }}</h1>
	<hr>
	
	<p>{{ $config->value }}</p>
	

@stop