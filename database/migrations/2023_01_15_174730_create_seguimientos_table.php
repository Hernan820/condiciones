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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->text('nota_seguimiento')->nullable();  
            $table->unsignedBigInteger('id_captura');
            $table->foreign('id_captura')->references('id')->on('capturas');
            $table->unsignedBigInteger('id_condicion');
            $table->foreign('id_condicion')->references('id')->on('condiciones');
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
        Schema::dropIfExists('seguimientos');
    }
};
