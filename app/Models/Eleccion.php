<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $table = 'ELECCIONS';
    protected $primaryKey = 'COD_ELECCION';

     // Nombre de la tabla en la base de datos



    protected $fillable = [
        'COD_ADMIN',
        'COD_FRENTE',
        'COD_TEU',
        'COD_COMITE',
        'MOTIVO_ELECCION',
        'FECHA_ELECCION',
        'FECHA_INI_CONVOCATORIA',
        'FECHA_FIN_CONVOCATORIA',
        'ELECCION_ACTIVA'
        // Agrega otros campos aquí
    ];

    public function tribunalElectoralUniversitario(){
        return $this->belongsTo(TribunalElectoralUniversitario::class, 'COD_TEU');
    }

    public function frente(){
        return $this->belongsTo(Frente::class, 'COD_FRENTE');
    }

    public function administrador(){
        return $this->belongsTo(Administrador::class, 'COD_ADMIN');
    }

    public function comiteElectoral(){
        return $this->hasOne(Comite_Electoral::class, 'COD_COMITE');
    }
}
