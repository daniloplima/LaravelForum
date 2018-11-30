<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('user_id');
            $table->string('answer_body');
            $table->timestamps();
            
        });
        /*Schema::table('respostas', function (Blueprint $table) {
        $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        $table->foreign('question_id')
                ->references('id')->on('perguntas')
                ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
