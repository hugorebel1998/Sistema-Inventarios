<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'No activo']);
            $table->enum('tipo_comprobante', ['Tiket', 'Factura', 'Guia de remisión']);
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->dateTime('fecha');
            // $table->decimal('impuesto',8,2);
            $table->decimal('total',8,2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proveedor_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('ingresos');
    }
}
