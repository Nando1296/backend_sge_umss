<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TribunalElectoralUniversitario extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_TEU';

    public function poblacion(){
        return $this->hasMany(Poblacion::class, 'COD_SIS');
    }

    public function eleccion(){
        return $this->hasMany(Eleccion::class, 'COD_ELECCION');
    }

    public function comiteElectoral(){
        return $this->hasMany(Comite_Electoral::class, 'COD_COMITE');
    }
}
