<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;

    protected $table = 'tipo_productos';
    protected $primaryKey = 'id_tipo_producto';
    public $incrementing = true;

    protected $fillable = [
        'slug',
        'imagen_url',
        'descuento',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function detalle()
    {
        return $this->hasOne(DescTipProd::class, 'id_tipo_producto');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pertenece', 'id_tipo_producto', 'id_producto')
            ->withTimestamps();
    }

    public function getEtiquetaAttribute(): string
    {
        $descripcion = optional($this->detalle)->descripcion_tipo_producto;

        return trim(($descripcion ?? 'Sin descripción') . ' · ' . number_format($this->descuento, 2) . '% desc.');
    }
}

