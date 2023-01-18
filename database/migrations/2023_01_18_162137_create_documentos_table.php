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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->text('pasaporte')->nullable();   
            $table->text('id_no')->nullable(); 
            $table->text('itin_letter')->nullable();
            $table->text('bank_statement')->nullable();
            $table->text('taxes_2021')->nullable();
            $table->text('taxes_2022')->nullable();
            $table->text('trid_form')->nullable();
            $table->text('credit_card')->nullable();
            $table->text('contrato')->nullable();
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
        Schema::dropIfExists('documentos');
    }
};
