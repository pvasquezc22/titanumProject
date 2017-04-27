@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>
                <div class="panel-body">
                    @if (Auth::guest())
                        Debes iniciar sesion, antes de continuar.
                    @else
                        Ya iniciaste sesion.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection