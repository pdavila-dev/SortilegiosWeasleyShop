<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescTipProd extends Model
{
    use HasFactory;

    protected $table = 'desc_tip_prod';
    protected $primaryKey = 'id_tipo_producto';
    public $incrementing = false;

    protected $fillable = [
        'id_tipo_producto',
        'descripcion_tipo_producto',
    ];

    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'id_tipo_producto');
    }
}

