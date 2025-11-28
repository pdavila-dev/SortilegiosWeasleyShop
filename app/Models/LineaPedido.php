<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;

    protected $table = 'linea_pedidos';
    protected $primaryKey = 'id_linea_pedido';
    public $incrementing = true;

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'descripcion_producto',
        'cantidad',
        'precio_unitario',
        'descuento',
        'precio_final',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}

