@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Editar Usuario
                </div>

                <div class="panel-body">
                    <form class="" action="{{route('usuarios.update',$user->id)}}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
						{{ csrf_field() }}
						<div class="form-group{{ ($errors->has('name')) ? $errors->first('name') : '' }}">
                            <label for="name">Nombre :</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Ingresa el nombre aqui" value="{{$user->name}}" autofocus="true">
							{!! $errors->first('name','<p class="help-block">:message</p>') !!}
						</div>
                        <div class="form-group{{ ($errors->has('email')) ? $errors->first('email') : '' }}">
                            <label for="email">Email :</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Ingresa el email aqui" value="{{$user->email}}">
                            {!! $errors->first('email','<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ ($errors->has('id_departamento')) ? $errors->first('id_departamento') : '' }}">
                            <label for="email">Departamento :</label>
                            <select id="id_departamento" name="id_departamento" class="form-control">
                                <option value="0" >Selecciona un departamento</option>
                                @foreach($departamentos as $departamento)
                                <option value="{{$departamento->id}}" @if ($user->id_departamento == $departamento->id) selected @endif >
                                {{$departamento->name}}
                                </option>
                                @endforeach
                            </select>
                            {!! $errors->first('id_departamento','<p class="help-block">:message</p>') !!}
                        </div>
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Editar">
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection