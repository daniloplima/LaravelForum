<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resposta extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function respostas(){
        return $this->belongsTo('App\pergunta');
    }
}
