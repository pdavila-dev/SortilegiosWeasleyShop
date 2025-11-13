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
        Schema::create('clientes_no_registrados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            $table->primary('id_cliente');
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
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
        Schema::dropIfExists('clientes_no_registrados');
    }
};
