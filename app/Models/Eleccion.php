<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_ELECCION';
    //protected $fillable=['MOTIVO_ELECCION','FECHA_INI_CONVOCATORIA','FECHA_FIN_CONVOCATORIA','FECHA_ELECCION']; //añadir en todos los modelos
    protected $guarded = []; //añadir en todos los modelos

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
