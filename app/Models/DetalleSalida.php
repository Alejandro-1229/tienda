<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleSalida extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDetalleOutpu';

    public function producto(): BelongsTo{
        return $this->belongsTo(Productos::class,'idProducto','idProducto');
    }
    public function reporte_salida(): BelongsTo{
        return $this->belongsTo(ReporteSalida::class,'idOutput','idOutput');
    }

    protected $fillable = [
        'cantidad',
        'idOutput',
        'idProducto'
    ];
}
