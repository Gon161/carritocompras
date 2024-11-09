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
        Schema::create('articulo_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Usuario')->nullable();
            $table->unsignedBigInteger('id_Producto')->nullable();
            $table->unsignedBigInteger('id_Promocion')->nullable();
            $table->unsignedBigInteger('id_Pago')->nullable();
            
            $table->foreign('id_Usuario')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('id_Producto')->references('id')->on('productos')->onDelete('set null');
            $table->foreign('id_Promocion')->references('id')->on('promociones')->onDelete('set null');
            $table->foreign('id_Pago')->references('id')->on('pagos')->onDelete('set null');
            $table->double('precio final');
            $table->integer('cantidad');
            $table->date('dfecha de pedido');
            $table->string('estatus');


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
        Schema::dropIfExists('articulo_pedidos');
    }
};
