<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('fecha_compra');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('suppliers');
            $table->foreign('user_id')->references('id')->on('users');
=======
            $table->enum('status',['Activo', 'Bloqueado'])->default('Activo');
            $table->string('name');
            $table->string('slug');
>>>>>>> 39b1dc3dc70ced6512677bc521c5783bced8657f
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
        Schema::dropIfExists('categories');
    }
}
