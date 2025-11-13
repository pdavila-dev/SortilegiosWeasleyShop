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
        Schema::create('clasificacion', function (Blueprint $table) {
            $table->bigIncrements('id_clasificacion');
            $table->unsignedBigInteger('id_tipo_generico');
            $table->unsignedBigInteger('id_tipo_especifico');
            $table->timestamps();

            $table->foreign('id_tipo_generico')
                ->references('id_tipo_producto')
                ->on('tipo_productos')
                ->cascadeOnDelete();
            $table->foreign('id_tipo_especifico')
                ->references('id_tipo_producto')
                ->on('tipo_productos')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clasificacion');
    }
};
