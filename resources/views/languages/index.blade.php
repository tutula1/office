@extends('layout')

@section('content')

<h1>Languages</h1>

<a href="{{ url('languages/create') }}" class="btn btn-primary btn-md" role="button">Create Language</a>
<hr/>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Vietnamese</th>
            <th>English</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <form action="">
            <tr>
                <td>{!! Form::text('name', $name, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::text('vi', $vi, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::text('en', $en, ['class' => 'form-control']) !!}</td>
                <td colspan="2">
                    {!! Form::submit(trans('lang.menu.search'), ['class' => 'btn btn-primary form-control']) !!}
                </td>
            </tr>
        </form>
        @foreach ($languages as $index => $language)
        @if($index == 0)
        <tr>
            <td colspan="6">
                <h3>
                    {{$language->group}}
                </h3>
            </td>
        </tr>
        @else
        @if($languages[$index]->group != $languages[$index -1]->group)
        <tr>
            <td colspan="6">
                <h3>
                    {{$language->group}}
                </h3>
            </td>
        </tr>
        @endif
        @endif
        <tr>
            <td>{{ $language->name }}</td>
            <td>{{ $language->vi }}</td>
            <td>{{ $language->en }}</td>
            <td><a href="{{ route('languages.edit', $language->id) }}">Edit Language</a></td>
            <td>   
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'frmDelete',
                'route' => ['languages.destroy', $language->id]
                ]) !!}
                {!! Form::submit('Delete Language?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="6" style="text-align: center;">
                {!! $languages->render(); !!}
            </td>
        </tr>
    </tbody>
    </table>
	

@stop