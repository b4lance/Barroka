@extends('layouts.app')

@section('contenido')
	<div class="container">
		<form action="{{route('noteStore')}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="user_id">Usuario</label>
				<select name="user_id" id="user_id" class="form-control">
					<option value="">Selecciona el Usuario</option>
					@foreach($users as $user)
					<option value="{{$user->id}}" {{old('user_id') ? 'selected' : ''}}>{{$user->publicist->fancy_name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="note">Nota</label>
				<textarea name="note" id="note" cols="30" rows="10" class="form-control">
					{{old('note')}}
				</textarea>
			</div>

			<div class="input-group" style="display: flex;justify-content: center;">
				<button type="submit" class="btn btn-sm btn-primary" style="margin-right: 10px;">Guardar</button>
				<a href="{{route('admin')}}" class="btn btn-danger">
					Regresar
				</a>
			</div>
		</form>
	</div>
@endsection