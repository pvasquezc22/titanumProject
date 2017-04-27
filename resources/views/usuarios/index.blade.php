@extends('layouts.app')

@section('content')
    @if (Auth::guest())
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">Inicio</div>
		                <div class="panel-body">
	                        Debes iniciar sesion, antes de continuar.
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    @else
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<i class="fa fa-users"></i> Usuarios
		                	<div class="pull-right">
								<a href="{{route('usuarios.create')}}" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-plus-circle"></i> Nuevo</a>
		                	</div>
		                </div>

		                <div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Carnet</th>
										<th>Exp</th>
										<th>Correo electronico</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php $num = 1; ?>
									@foreach($users as $user)
										<tr>
											<td>{{$num++}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->carnet}}</td>
											<td>{{$user->departamento_abreviatura}}</td>
											<td>{{$user->email}}</td>
											<td>
												<a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											</td>
											<td>
												<form class="" action="{{route('usuarios.destroy',$user->id)}}" method="post">
													<input type="hidden" name="_method" value="delete">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?');"><i class="fa fa-trash"></i></button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@endsection