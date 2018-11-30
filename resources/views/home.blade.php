@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de perguntas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>
                    Bem vindo!<br>
                    <a class="btn btn-small btn-info" href="{{ URL::to('perguntas') }}">Ver perguntas</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('perguntas/create') }}">Fazer perguntas</a>
                    </center>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
