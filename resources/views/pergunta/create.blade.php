@extends('layouts.app')
@php


$user_id = Auth::id(); 

@endphp
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(isset($pergunta))
                <div class="panel-heading">Editar pergunta</div>
                @else
                <div class="panel-heading">Criar uma pergunta</div>
                @endif
                <div class="panel-body">
                @if(isset($pergunta))
                {{ Form::open(['route' => ['perguntas.update', $pergunta->id], 'method' => 'PUT']) }}
                @else
                {{ Form::open(['action' => 'PerguntaController@store']) }}
                @endif
                {{ Form::text('question_header', '', ['class'=>'form-control', 'required',  'placeholder' => 'Título da pergunta']) }}
                <br>
                {{ Form::textarea('question_body', '', ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'texto da pergunta']) }}
                <br>
                {{ Form::label('question_category', 'Categoria da questão ') }}
                {{ Form::select('question_category', ['Infraestrutura', 'Programação'], ['class'=>'form-control', 'required']) }}
                <br>
                {{Form::hidden('user_id', $user_id ,['required'])}}
                <br>
                {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success']) }}
                {{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection