<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $incrementing = true;

    protected $fillable = [
        'id_cliente',
        'nombre_contacto',
        'correo_contacto',
        'direccion_envio',
        'total_pedido',
        'fecha_pedido',
        'hora_inicio_compra',
        'hora_fin_compra',
        'ip_compra',
    ];

    public function user()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function items()
    {
        return $this->hasMany(LineaPedido::class, 'id_pedido', 'id_pedido');
    }
}

