		<div class="form-group">
			{!! Form::label('role_id', 'Role:') !!}
			{!! Form::select('role_id', $role, null, ['id' => 'role_id', 'class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
		</div>
		
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
		
		@section('footer')
		
		<script>
			$('select#role_id.form-control').select2({
				placeholder: 'Choose a Role'
			});
		</script>
		
		@endsection
		