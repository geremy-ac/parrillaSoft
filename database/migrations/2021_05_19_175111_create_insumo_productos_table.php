<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('Insumo_id')->unsigned();
            $table->unsignedBigInteger('Producto_id')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('Insumo_id')->references('id')->on('insumo')
                    ->onDelete('cascade');

            $table->foreign('Producto_id')->references('id')->on('productos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumo_productos');
    }
}
