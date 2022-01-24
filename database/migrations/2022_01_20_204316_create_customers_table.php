<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'Bloqueado'])->default('Activo');
            $table->string('name');
            $table->string('apellidos');
            $table->string('tipo_documento')->nullable();
            $table->string('telefono', 10);
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('imagen_cliente')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
