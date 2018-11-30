<?php

namespace App\Http\Controllers;

use App\pergunta;
use Illuminate\Http\Request;
use DB;


class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perguntas = pergunta::All();
        return view('pergunta.index', [ 'perguntas' =>$perguntas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pergunta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perguntas = pergunta::All();
        $this->validate($request, [
            'question_header' =>  'required',
            'question_body' =>  'required',
            'question_category' => 'required',
            'user_id' => 'required',
        ]);
        $pergunta = new pergunta;
        $pergunta->question_header = $request->input('question_header');
        $pergunta->question_body = $request->input('question_body');
        $pergunta->question_category = $request->input('question_category');
        $pergunta->user_id = $request->input('user_id');
        if($pergunta->save()){
            return view('pergunta.index', [ 'perguntas' =>$perguntas]);
        }
        return Response('Não foi possível realizar a operação', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pergunta = DB::table('perguntas')->where('id', $id)->get();
        $resposta = DB::table('respostas')->where('question_id', $id)->get();

        return view('pergunta.show', [ 'perguntas' =>$pergunta], [ 'respostas' =>$resposta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pergunta = pergunta::find($id);
        return view('pergunta.create', [ 'pergunta' =>$pergunta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perguntas = pergunta::All();
        $pergunta = pergunta::find($id);
        $this->validate($request, [
            'question_header' =>  'required',
            'question_body' =>  'required',
            'question_category' => 'required',
            'user_id' => 'required',
        ]);
        $pergunta->question_header = $request->input('question_header');
        $pergunta->question_body = $request->input('question_body');
        $pergunta->question_category = $request->input('question_category');
        $pergunta->user_id = $request->input('user_id');
        if($pergunta->save()){
            return view('pergunta.index', [ 'perguntas' =>$perguntas]);
        }
        return Response('Não foi possível realizar a operação', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perguntas = pergunta::All();
        $pergunta = pergunta::find($id);
        $pergunta->delete();
        return view('pergunta.index', ['perguntas' =>$perguntas]);
    }
}
