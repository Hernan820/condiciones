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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_cliente')->nullable(); 
            $table->text('telefono')->nullable(); 
            $table->text('correo')->nullable(); 
            $table->text('direccion')->nullable(); 
            $table->text('direcionalternativa')->nullable(); 
            $table->text('status')->nullable(); 
            $table->text('socials_number')->nullable(); 
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
        Schema::dropIfExists('clientes');
    }
};
