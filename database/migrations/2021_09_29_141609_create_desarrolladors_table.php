<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesarrolladorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//hace que la migracion se cre dentro de la database
    {
        Schema::create('desarrolladores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('proyectoId')->constrained('proyectos'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//elimina la tabla desarrolladores
    {
        Schema::table('desarrolladores', function(Blueprint $table){
            $table->dropForeign('desarrolladores_proyectoid_foreign');
        });
        Schema::dropIfExists('desarrolladores');
    }
}
