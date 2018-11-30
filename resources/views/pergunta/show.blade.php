@extends('layouts.app')
@php
$user_id = Auth::id();

@endphp

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              
                <div class="panel-body">
                    @foreach($perguntas as $pergunta)
                    <hr>
                    <h3>Pergunta feita:</h3>
                    <h3>{{$pergunta->question_header}}</h3><br>
                   
                    <h4>{{$pergunta->question_body}}</h4>
                    <h5>Feita em: {{$pergunta->created_at}}</h5><br>
                    <hr>
                    {{ Form::open(['action' => 'RespostaController@store']) }}
                    {{ Form::textarea('answer_body', '', ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'texto da resposta']) }}
                    <br>
                    {{Form::hidden('user_id', $user_id ,['required'])}}
                    {{Form::hidden('question_id', $pergunta->id ,['required'])}}
                    <br>
                    {{ Form::submit('Responder', ['class' => 'btn btn-outline-success']) }}
                    {{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}
                    {{ Form::close() }}
                    @endforeach
                    <hr>
                    <h4>Respostas:</h4><br>
                    @foreach($respostas as $resposta)
                    <hr>
                    <p>{{$resposta->answer_body}}</p>
                    @if($pergunta->user_id == $user_id)   
                    {{ Form::open(['route'=>['respostas.destroy', $resposta->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
                    {{ Form::close() }}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection