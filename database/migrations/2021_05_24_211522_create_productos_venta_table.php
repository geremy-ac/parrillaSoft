<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Venta_id')->unsigned();
            $table->unsignedBigInteger('Producto_id')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('Venta_id')->references('id')->on('ventas')
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
        Schema::dropIfExists('productos_venta');
    }
}
