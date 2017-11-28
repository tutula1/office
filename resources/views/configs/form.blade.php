		
		<div class="form-group">
			{!! Form::label('key', 'Key:') !!}
			{!! Form::text('key', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
            {!! Form::label('value', 'Value:') !!}
            {!! Form::text('value', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
		