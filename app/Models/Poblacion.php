<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Poblacion extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_SIS';

    public function tribunalElectoralUniversitario(){
        return $this->belongsTo(TribunalElectoralUniversitario::class, 'COD_TEU');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'COD_CARRERA');
    }

    public function jurado(){
        return $this->hasOne(Jurado::class, 'COD_JURADO');
    }

    public function comiteElectoral(){
        return $this->belongsTo(Comite_Electoral::class, 'COD_COMITE');
    }

    public function candidato(){
        return $this->hasOne(Candidato::class, 'COD_CANDIDATO');
    }
}
