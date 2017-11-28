@extends('layout')

@section('content')

<h1>{{trans('lang.menu.jobs.jobs')}}</h1>

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

        @foreach ($jobs as $job)

        <tr>
            <td>{{ $job->id }}</td>
            <td>{{ $job->name }}</td>
            <td><a href="{{ route('users.show', $user->id) }}">Show User</a></td>
            <td><a href="{{ route('users.edit', $user->id) }}">Edit User</a></td>
            <td>   
                @if ($job->id != 1)
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['jobs.destroy', $job->id]
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