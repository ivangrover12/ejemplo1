@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(['route' => 'trainers.store', 'method' => 'POST', 'files' => true ]) !!}

		{{-- <div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('slug', 'Slug') !!}
			{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('avatar', 'Avatar') !!}
			{!! Form::file('avatar') !!}
		</div> --}}
		@include('trainers.form')
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}

	{{-- <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
		
	@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar">
		</div>

		<button type="submit" class="btn btn-primary">Guardar</button>
	</form> --}}
	
@endsection



