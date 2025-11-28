<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $incrementing = true;
    protected $guarded = [];

    public function registrado()
    {
        return $this->hasOne(ClienteRegistrado::class, 'id_cliente');
    }

    public function noRegistrado()
    {
        return $this->hasOne(ClienteNoRegistrado::class, 'id_cliente');
    }

    public function pedidos()
    {
        return $this->hasMany(Order::class, 'id_cliente', 'id_cliente');
    }
}

