@extends('layout')

@section('content')

	<h1>Permissions</h1>
	
	<a href="{{ url('permissions/create') }}" class="btn btn-primary btn-md" role="button">Create Permission</a>
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
	
	@foreach ($permissions as $index => $permission)
	
			<tr>
                 <td colspan="6"><h3>{{ $permission->group }}</h3></td>
			</tr>
            @foreach ($permission->permission as $idx => $per)
            <tr>
                 <td></td>
                 <td>{{ $index + 1 }}.{{ $idx + 1 }}</td>
                 <td>{{ $per->description }}</td>
                 <td><a href="{{ route('permissions.show', $per->id) }}">Show Permission</a></td>
                 <td><a href="{{ route('permissions.edit', $per->id) }}">Edit Permission</a></td>
                 <td>   
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['permissions.destroy', $per->id]
                        ]) !!}
                        {!! Form::submit('Delete Permission?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
	
	@endforeach
	
		</tbody>
    </table>
	

@stop