<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescProd extends Model
{
    use HasFactory;

    protected $table = 'desc_prod';
    protected $primaryKey = 'id_producto';
    public $incrementing = false;

    protected $fillable = [
        'id_producto',
        'descripcion_producto',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

