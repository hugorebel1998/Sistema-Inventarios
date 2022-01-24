<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pendiente', 'Aprovado']);
            $table->string('tipo_pedido');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('customers');
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
        Schema::dropIfExists('pedidos');
    }
}
