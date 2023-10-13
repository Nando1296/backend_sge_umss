<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_ELECCION';

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
