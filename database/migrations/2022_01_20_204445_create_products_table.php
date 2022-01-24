<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'No activo'])->default('Activo');
            $table->string('name');
            $table->text('descripcion');
            $table->string('imagen_producto');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('unidad_id')->references('id')->on('unida_medidas');
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
        Schema::dropIfExists('products');
    }
}
