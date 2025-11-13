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
        Schema::create('asociacion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tipo_cliente');
            $table->timestamps();

            $table->primary(['id_cliente', 'id_tipo_cliente']);
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->cascadeOnDelete();
            $table->foreign('id_tipo_cliente')
                ->references('id_tipo_cliente')
                ->on('tipo_clientes')
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
        Schema::dropIfExists('asociacion');
    }
};
