<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('serie');
            $table->text('descipcion');
            $table->integer('stock_ingreso');
            $table->integer('stock_actual');
            $table->decimal('precio_compra', 11,2);
            $table->decimal('precio_venta_distribuidor', 11,2);
            $table->decimal('precio_venta_publico', 11,2);
            $table->unsignedBigInteger('ingreso_id');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('ingreso_id')->references('id')->on('ingresos');
            $table->foreign('producto_id')->references('id')->on('products');
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
        Schema::dropIfExists('detalle_ingresos');
    }
}
