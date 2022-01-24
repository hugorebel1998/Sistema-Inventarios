<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'No activo']);
            $table->string('tipo_venta');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->dateTime('fecha');
            $table->decimal('impuesto', 11,2);
            $table->string('total', 11,2);
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('ventas');
    }
}
