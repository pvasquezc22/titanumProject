@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Departamentos
                	<div class="pull-right">
						<a href="{{route('departamento.create')}}" class="btn btn-primary btn-xs pull-right"> + Nuevo</a>
                	</div>
                </div>

                <div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nombre</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php $num = 1; ?>
							@foreach($departamentos as $departamento)
								<tr>
									<td>{{$num++}}</td>
									<td>{{$departamento->name}}</td>
									<td>
										<a href="{{route('departamento.edit',$departamento->id)}}" class="btn btn-warning">Editar</a>
									</td>
									<td>
										<form class="" action="{{route('departamento.destroy',$departamento->id)}}" method="post">
											<input type="hidden" name="_method" value="delete">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?');" name="name" value="Eliminar">
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
@endsection