@extends('layout')

@section('content')

<h1>Users</h1>

<a href="{{ url('users/create') }}" class="btn btn-primary btn-md" role="button">Create User</a>
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

        @foreach ($users as $user)

        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><a href="{{ route('users.show', $user->id) }}">Show User</a></td>
            <td><a href="{{ route('users.edit', $user->id) }}">Edit User</a></td>
            <td>   
                @if ($user->id != 1)
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['users.destroy', $user->id]
                ]) !!}
                {!! Form::submit('Delete User?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endif
            </td>
        </tr>

        @endforeach

    </tbody>
    </table>

@stop