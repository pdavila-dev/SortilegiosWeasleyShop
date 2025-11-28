<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteNoRegistrado extends Model
{
    use HasFactory;

    protected $table = 'clientes_no_registrados';
    protected $primaryKey = 'id_cliente';
    public $incrementing = false;
    protected $fillable = ['id_cliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}

