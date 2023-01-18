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
        Schema::create('detalle_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_registro');
            $table->foreign('id_registro')->references('id')->on('registros');
            $table->unsignedBigInteger('id_documento');
            $table->foreign('id_documento')->references('id')->on('documentos');
            $table->text('chekc_documento')->nullable();
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
        Schema::dropIfExists('detalle_documentos');
    }
};
