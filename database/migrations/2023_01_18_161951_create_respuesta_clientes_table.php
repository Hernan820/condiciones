<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_clientes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cuestionario_clientes');
            $table->foreign('id_cuestionario_clientes')->references('id')->on('cuestionario_clientes');

            $table->unsignedBigInteger('id_pregunta');
            $table->foreign('id_pregunta')->references('id')->on('preguntas');
            
            $table->text('respuesta')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_clientes');
    }
};
