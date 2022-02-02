<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Activo', 'No activo'])->default('Activo');
            $table->string('name');
            $table->string('apellidos');
            $table->enum('tipo_documento', ['Ine', 'Curp', 'Licencia', 'Pasaporte', 'Otro']);
            $table->string('telefono', 10);
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->string('imagen_colavorador')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('collaborators');
    }
}
