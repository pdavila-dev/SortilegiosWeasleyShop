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
        Schema::create('clientes_registrados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cliente');
            $table->string('nif', 20)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('apellidos', 100)->nullable();
            $table->string('correo_electronico', 100)->unique();
            $table->string('contrasena', 255);
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_primera_compra')->nullable();
            $table->date('fecha_ultima_compra')->nullable();
            $table->decimal('importe_acumulado_compras', 12, 2)->default(0);
            $table->unsignedInteger('numero_compras')->default(0);
            $table->boolean('baja_logica')->default(false);
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
        Schema::dropIfExists('clientes_registrados');
    }
};
