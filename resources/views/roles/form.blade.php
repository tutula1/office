<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <ul class="list-group">

        @foreach ($permissions as $index => $item)

        <li class="list-group-item"><h3>{{ $item->group }}</h3></li>
        @foreach ($item->permission as $idx => $permission)
        <li class="list-group-item">
            <label>
                <input type="checkbox" name="permission_list[]" value="{{ $permission->id }}" @if(in_array($permission->id, $role->permission_list)) checked @endif > {{ $permission->description }}
            </label>
        </li>
        @endforeach

        @endforeach
    </ul>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>