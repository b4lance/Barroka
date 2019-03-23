@extends('layouts.app')

@section('contenido')
	<div class="container">
		<form action="{{route('noteUpdate',$user->id)}}" method="GET">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="user_id">Usuario</label>
				<input type="text" class="form-control" name="user_id" value="{{$user->publicist->fancy_name}}" disabled>
			</div>

			<div class="form-group">
				<label for="note">Nota</label>
				<textarea name="note" id="note" cols="30" rows="10" class="form-control">{{$user->notes}}</textarea>
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