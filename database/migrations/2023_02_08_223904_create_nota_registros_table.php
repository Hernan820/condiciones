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
        Schema::create('nota_registros', function (Blueprint $table) {
            $table->id();
            $table->text('nota_registro')->nullable(); 
            $table->text('nombre_usuario')->nullable(); 
            $table->text('fecha')->nullable(); 
            $table->text('hora')->nullable(); 
            $table->unsignedBigInteger('id_registro');
            $table->foreign('id_registro')->references('id')->on('registros');
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
        Schema::dropIfExists('nota_registros');
    }
};
