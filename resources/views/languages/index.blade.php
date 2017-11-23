@extends('layout')

@section('content')

	<h1>Languages</h1>
	
	<a href="{{ url('languages/create') }}" class="btn btn-primary btn-md" role="button">Create Language</a>
	<hr/>
	
	<table class="table table-bordered">
        <thead>
			<tr>
                <th></th>
				<th>Index</th>
				<th>Name</th>
				<th>Show</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
        </thead>
		<tbody>
	
	@foreach ($languages as $index => $language)
	
			<tr>
                 <td colspan="6"><h3>{{ $language->group }}</h3></td>
			</tr>
            @foreach ($language->language as $idx => $lang)
            <tr>
                 <td></td>
                 <td>{{ $index + 1 }}.{{ $idx + 1 }}</td>
                 <td>{{ $lang->name }}</td>
                 <td><a href="{{ route('languages.show', $lang->id) }}">Show Language</a></td>
                 <td><a href="{{ route('languages.edit', $lang->id) }}">Edit Language</a></td>
                 <td>   
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['languages.destroy', $lang->id]
                        ]) !!}
                        {!! Form::submit('Delete Language?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
	
	@endforeach
	
		</tbody>
    </table>
	

@stop