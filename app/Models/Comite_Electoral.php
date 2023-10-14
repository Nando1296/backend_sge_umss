<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite_Electoral extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_COMITE';
    protected $guarded = [];

    public function tribunalElectoralUniversitario(){
        return $this->belongsTo(TribunalElectoralUniversitario::class, 'COD_TEU');
    }

    public function poblacion(){
        return $this->hasMany(Poblacion::class, 'COD_SIS');
    }

    public function eleccion(){
        return $this->hasOne(Eleccion::class, 'COD_ELECCION');
    }

    public function administrador(){
        return $this->hasOne(Administrador::class, 'COD_ADMIN');
    }

    public function mesa(){
        return $this->hasMany(Mesa::class, 'COD_MESA');
    }
}
