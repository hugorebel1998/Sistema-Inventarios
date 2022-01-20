<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('telefono_1', 10)->unique();
            $table->string('telefono_2', 10);
            $table->string('calle');
            $table->string('numero_int');
            $table->string('numero_ext');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('imagen_proveedor');
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
        Schema::dropIfExists('suppliers');
    }
}
