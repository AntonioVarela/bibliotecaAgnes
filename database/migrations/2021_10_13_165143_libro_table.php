<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('identificador');
            $table->string('autor');
            $table->string('autor2')->nullable();
            $table->string('editorial')->nullable();
            $table->string('NEdicion')->nullable();
            $table->string('notas')->nullable();
            $table->string('isbn')->nullable();
            $table->string('imagen')->nullable()->default("null");
            $table->string('categoria')->nullable()->default("Bronce");
            $table->string('codigobarras')->nullable();
            $table->string('idioma')->nullable();
            $table->string('anio')->nullable();
            $table->string('tema')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('libro');
    }
}
