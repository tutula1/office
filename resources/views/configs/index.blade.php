@extends('layout')

@section('content')

<h1>Configs</h1>

<a href="{{ url('configs/create') }}" class="btn btn-primary btn-md" role="button">Create Config</a>
<hr/>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Value</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($configs as $index => $config)
        @if($index == 0)
        <tr>
            <td colspan="5">
                <h3>
                    @if($config->user_id != 0)

                    @else
                    All
                    @endif
                </h3>
            </td>
        </tr>
        @else
        @if($configs[$index]->user_id != $configs[$index -1]->user_id)
        <tr>
            <td colspan="5">
                <h3>
                    @if($config->user_id != 0)
                    {{$config->user->name}}
                    @else
                    All
                    @endif
                </h3>
            </td>
        </tr>
        @endif
        @endif
        <tr>
            <td>{{ $config->id }}</td>
            <td>{{ $config->key }}</td>
            <td>{{ $config->value }}</td>
            <td><a href="{{ route('configs.edit', $config->id) }}">Edit Config</a></td>
            <td>   
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'frmDelete',
                'route' => ['configs.destroy', $config->id]
                ]) !!}
                {!! Form::submit('Delete Config?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>

        @endforeach

    </tbody>
    </table>

@stop