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
            $table->text('fecha_recepcion')->nullable();   
            $table->text('fecha_firma')->nullable(); 
            $table->text('dowpayment')->nullable();
            $table->text('precio_casa')->nullable();
            $table->text('estado')->nullable();
            $table->text('drive')->nullable();
            $table->text('num_prestamo')->nullable();   
            $table->text('direccion_casa')->nullable();   
            $table->text('notas')->nullable();   
            $table->text('procesador')->nullable();
            $table->text('Appraisal')->nullable();
            
            $table->unsignedBigInteger('id_prestamo');
            $table->foreign('id_prestamo')->references('id')->on('prestamos');  

            $table->unsignedBigInteger('id_banco');
            $table->foreign('id_banco')->references('id')->on('bancos');  
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes');  
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_compania');
            $table->foreign('id_compania')->references('id')->on('companias');
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
