		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('permission_list', 'Permissions:') !!}
			{!! Form::select('permission_list[]', $permissions, null, ['id' => 'permission_list', 'class' => 'form-control', 'multiple']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
		
		@section('footer')
		
		<script>
			$('select#permission_list.form-control').select2({
				placeholder: 'Choose a permission'
			});
		</script>
		
		@endsection