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
        Schema::create('desc_tip_cli', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tipo_cliente');
            $table->string('descripcion_tipo_cliente', 255);
            $table->timestamps();

            $table->primary(['id_tipo_cliente']);
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
        Schema::dropIfExists('desc_tip_cli');
    }
};
