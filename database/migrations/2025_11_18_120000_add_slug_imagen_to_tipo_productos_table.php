<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tipo_productos', function (Blueprint $table) {
            $table->string('slug')->unique()->after('id_tipo_producto');
            $table->string('imagen_url')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('tipo_productos', function (Blueprint $table) {
            $table->dropColumn(['slug', 'imagen_url']);
        });
    }
};

