<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_materials', function (Blueprint $table) {
            $table->increments('id');
            //creacion de columna - entero positivo
            $table->integer('personal_id')->unsigned();
            //crear la clave foranea
            $table->foreign('personal_id')
                  ->references('id')
                  ->on('personals')
                  ->onDelete('cascade');

            $table->string('num_factura')->unique();
            $table->date('fecha_compra');
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
        Schema::dropIfExists('compra_materials');
    }
}
