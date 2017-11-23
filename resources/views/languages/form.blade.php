		<div class="form-group">
            {!! Form::label('group', 'Group:') !!}
            {!! Form::text('group', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('vi', 'Vietnamese:') !!}
			{!! Form::text('vi', null, ['class' => 'form-control']) !!}
		</div>
        
        <div class="form-group">
            {!! Form::label('en', 'English:') !!}
            {!! Form::text('en', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>