<?php

namespace App\Http\Controllers;

use App\resposta;
use Illuminate\Http\Request;
use DB;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'answer_body' =>  'required',
            'question_id' =>  'required',
            'user_id' => 'required',
        ]);
        $resposta = new resposta;
        $resposta->answer_body = $request->input('answer_body');
        $resposta->question_id = $request->input('question_id');
        $resposta->user_id = $request->input('user_id');
        if($resposta->save()){
            return view('home');
        }
        return Response('Não foi possível realizar a operação', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(resposta $resposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function edit(resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resposta = resposta::find($id);
        $resposta->delete();
        return view('home');
    }
}
