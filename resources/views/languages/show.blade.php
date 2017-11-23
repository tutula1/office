@extends('layout')

@section('content')


	<h1>{{ $language->name }}</h1>
	<hr>
	
    <p>{{ $language->group }}</p>
    <p>{{ $language->vi }}</p>
	<p>{{ $language->en }}</p>
	
	

@stop