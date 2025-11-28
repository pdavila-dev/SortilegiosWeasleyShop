<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('nombre_contacto', 150)->nullable()->after('id_cliente');
            $table->string('correo_contacto', 120)->after('nombre_contacto');
            $table->text('direccion_envio')->nullable()->after('correo_contacto');
        });
    }

    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn(['nombre_contacto', 'correo_contacto', 'direccion_envio']);
        });
    }
};

