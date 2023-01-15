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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_cliente')->nullable();   
            $table->text('telefono')->nullable();   
            $table->text('num_prestamo')->nullable();   
            $table->text('direccion_casa')->nullable();   
            $table->text('fecha_recepcion')->nullable();   
            $table->text('notas')->nullable();   
            $table->text('procesador')->nullable();
            $table->unsignedBigInteger('id_banco');
            $table->foreign('id_banco')->references('id')->on('bancos');   
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('registros');
    }
};
