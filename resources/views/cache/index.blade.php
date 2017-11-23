@extends('layout')

@section('content')

    <h1>Cache</h1>
    
    <hr/>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>File</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    
    @foreach ($keys as $index => $key)
            <tr>
                 <td>{{ str_replace("+-+", "\\", $key) }}</td>
                 <td>   
                        {!! Form::open([
                            'method' => 'DELETE',
                            'class' => 'frmDelete',
                            'route' => ['cache.destroy', urlencode($key)]
                        ]) !!}
                        {!! Form::submit('Delete Cache?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
            </tr>
    
    @endforeach
    
        </tbody>
    </table>
    

@stop