<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('precio_venta', 11,2);
            $table->decimal('descuento', 11,2);
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('detalle_ingreso_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('detalle_ingreso_id')->references('id')->on('detalle_ingresos');
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
