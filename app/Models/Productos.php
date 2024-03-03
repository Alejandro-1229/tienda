<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Productos extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProducto';

    public function detalle_salida(): HasMany{
        return $this->hasMany(DetalleSalida::class,'idProducto','idProducto');
    }

    protected $fillable = [
        'estado',
        'SKU',
        'nombre',
        'precio',
        'stock',
        'fechaVencimiento',
        'categoria'
    ];

    
}
