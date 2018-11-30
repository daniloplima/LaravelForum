<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pergunta extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function respostas(){
        return $this->hasMany('App\resposta');
    }
}
