@extends('layouts.app')

@section('contenido')
	<div class="container">
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-publicistas-tab" data-toggle="tab" href="#nav-publicistas" role="tab" aria-controls="nav-publicistas" aria-selected="true">Lista de Publicistas</a>
    <a class="nav-item nav-link" id="nav-standar-tab" data-toggle="tab" href="#nav-standar" role="tab" aria-controls="nav-standar" aria-selected="false">Lista de Standar User</a>
    <a class="nav-item nav-link" id="nav-notas-tab" data-toggle="tab" href="#nav-notas" role="tab" aria-controls="nav-notas" aria-selected="false"> Lista de Notas</a>
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-publicistas" role="tabpanel" aria-labelledby="nav-publicistas-tab">
		<div class="row">
		<div class="col-sm-12">
		<table  class="table table-striped table-bordered dt-responsive wrap tabla">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">Email</th>
					<th align="center">Telefono</th>
					<th align="center">Nombre</th>
					<th align="center">Fecha de Alta</th>
					<th align="center">Estado</th>
					<th align="center">Notas</th>
				</tr>
			</thead>
			<tbody>
				@foreach($publicists as $publicist)
				<tr>
					<td>{{$pu++}}</td>
					<td>{{$publicist->user->email}}</td>
					<td>{{$publicist->phone}}</td>
					<td>{{$publicist->fancy_name}}</td>
					<td>{{$publicist->created_at}}</td>
					<td>
						<form action="{{route('updateStatus',$publicist->id)}}" method="GET">
						@csrf
						@method('PUT')
						@if($publicist->profile_status == 'ACTIVO')
							<button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Desea cambiar el status del Publicista?');" value="INACTIVO" name="profile">{{$publicist->profile_status}}</button>
						@else
							<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea cambiar el status del Publicista?');" value="ACTIVO" name="profile">{{$publicist->profile_status}}</button>
						@endif
					</td>
						</form>
					<td>
					@if($publicist->user->notes)
						{{$publicist->user->notes}}
					@else
						No hay notas asignadas a este usuario
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-standar" role="tabpanel" aria-labelledby="nav-standar-tab">
  	<div class="row">
		<div class="col-sm-12">
		<table class="table table-striped table-bordered dt-responsive wrap tabla" width="100%">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">Email</th>
					<th align="center">Fecha de Alta</th>
					<th align="center">Perfiles que comento</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$u++}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>
					<td>
					@if(count($user->publicists)>0)
					@foreach($user->publicists as $p)
						<a href="{{route('perfil',$p->id)}}">{{$p->id}}</a>-
					@endforeach	
					@else
					<h6>No ha comentado perfiles</h6>
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-notas" role="tabpanel" aria-labelledby="nav-notas-tab">
		<div class="row">
		<div class="col-sm-12">
			<a href="{{route('nuevanota')}}" class="btn btn-sm btn-primary" style="margin-top: 20px;margin-bottom: 20px;">Nueva Nota</a>
		<table class="table table-striped table-bordered dt-responsive wrap tabla" width="100%">

			<thead>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Nota</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($publicists as $publicist)
				<tr>
					<td>{{$n++}}</td>
					<td>{{$publicist->fancy_name}}</td>
					<td>
					 @if($publicist->user->notes != null)
						{{$publicist->user->notes}}
					 @else
						<h6>No se han Agregado notas a este usuario</h6>
					@endif
					</td>
					<td><a href="{{route('EditarNota',$publicist->user_id)}}" class="btn btn-warning text-white">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
  </div>
</div>
</div>
@endsection
@section('scripts')
	<script>
		$(document).ready(function() {
    		$('.tabla').DataTable();
		} );
	</script>
@endsection