<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteRegistrado extends Model
{
    use HasFactory;

    protected $table = 'clientes_registrados';
    protected $primaryKey = 'id_cliente';
    public $incrementing = false;
    protected $fillable = [
        'id_cliente',
        'nif',
        'nombre',
        'apellidos',
        'correo_electronico',
        'contrasena',
        'fecha_nacimiento',
        'fecha_primera_compra',
        'fecha_ultima_compra',
        'importe_acumulado_compras',
        'numero_compras',
        'baja_logica',
    ];

    protected $hidden = ['contrasena'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}

