@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Crear Departamento
                </div>

                <div class="panel-body">
					<form class="" action="{{route('departamento.store')}}" method="post">
						{{ csrf_field() }}
						<div class="form-group{{ ($errors->has('departamento_name')) ? $errors->first('departamento_name') : '' }}">
							<label for="departamento_name">Nombre :</label>
							<input type="text" id="departamento_name" name="departamento_name" class="form-control" placeholder="Ingresa el nombre aqui" autofocus>
							{!! $errors->first('departamento_name','<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="name" value="Guardar">
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection