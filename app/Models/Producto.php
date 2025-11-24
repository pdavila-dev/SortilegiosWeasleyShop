<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $incrementing = true;

    protected $fillable = [
        'precio_actual',
        'oferta',
        'preu_oferta',
        'stock_inicial',
        'stock_actual',
        'stock_notificacion',
    ];

    protected $casts = [
        'oferta' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'id_producto';
    }

    public function descripcion()
    {
        return $this->hasOne(DescProd::class, 'id_producto');
    }

    public function tipos()
    {
        return $this->belongsToMany(TipoProducto::class, 'pertenece', 'id_producto', 'id_tipo_producto')
            ->withTimestamps();
    }
}

