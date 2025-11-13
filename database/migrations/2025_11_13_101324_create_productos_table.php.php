<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->decimal('precio_actual', 12, 2);
            $table->boolean('oferta')->default(false);
            $table->decimal('preu_oferta', 12, 2)->nullable();
            $table->unsignedInteger('stock_inicial')->default(0);
            $table->unsignedInteger('stock_actual')->default(0);
            $table->unsignedInteger('stock_notificacion')->default(0);
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
        Schema::dropIfExists('productos');
    }
};
