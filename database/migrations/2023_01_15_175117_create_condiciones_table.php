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
        Schema::create('condiciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable(); 
            $table->unsignedBigInteger('id_registro');
            $table->foreign('id_registro')->references('id')->on('registros');
            $table->text('estado')->nullable();  
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados'); 
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
        Schema::dropIfExists('condiciones');
    }
};
