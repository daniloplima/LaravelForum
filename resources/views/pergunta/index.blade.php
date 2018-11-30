@extends('layouts.app')
@php
$user_id = Auth::id();
@endphp

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perguntas feitas:</div>

                <div class="panel-body">
                    @foreach($perguntas as $pergunta)
                    <hr>
                    <a href="{{ URL::to('perguntas/' . $pergunta->id) }}"><h3>{{$pergunta->question_header}}</h3></a><br>
                    <h5>Pergunta feita em: {{$pergunta->created_at}}</h5><br>
                    @if($pergunta->user_id == $user_id)
                    <a class="btn btn-small btn-info" href="{{ URL::to('perguntas/' . $pergunta->id . '/edit') }}">Editar Pergunta</a>   
                    {{ Form::open(['route'=>['perguntas.destroy',$pergunta->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
                    {{ Form::close() }}
                    @endif
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection