<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReporteSalida extends Model
{
    use HasFactory;

    protected $primaryKey = 'idOutput';

    public function detalle_salida(): HasMany{
        return $this->hasMany(DetalleSalida::class,'idOutPut','idOutPut');
    }

    protected $fillable = [
        'fechaReporte',
        'descripcion',
        'idUsuario'
    ];
}
