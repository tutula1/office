@extends('layout')

@section('content')

<h1>Roles</h1>

<a href="{{ url('roles/create') }}" class="btn btn-primary btn-md" role="button">Create Role</a>
<hr/>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $role)

        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td><a href="{{ route('roles.show', $role->id) }}">Show Role</a></td>
            <td><a href="{{ route('roles.edit', $role->id) }}">Edit Role</a></td>
            <td>   
                @if ($role->id != 1)
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['roles.destroy', $role->id]
                ]) !!}
                {!! Form::submit('Delete Role?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endif
            </td>
        </tr>

        @endforeach

    </tbody>
    </table>
	
@stop