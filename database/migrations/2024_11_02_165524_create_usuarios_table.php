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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono',10)->nullable();
            $table->string('correo');
            $table->string('password');
            $table->text('token_recovery')->nullable();
            $table->dateTime('nacimiento')->nullable();
            $table->unsignedBigInteger('id_Direccion')->nullable();
            $table->foreign('id_Direccion')->references('id')->on('direcciones')->onDelete('set null');
            $table->unsignedBigInteger('id_Tarjeta')->nullable();
            $table->foreign('id_Tarjeta')->references('id')->on('tarjetas')->onDelete('set null');

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
        Schema::dropIfExists('usuarios');
    }
};
