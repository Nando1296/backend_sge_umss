<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite_Electoral extends Model
{
    use HasFactory;
    protected $keyType = 'integer';

    protected $table = 'comite_electorals'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'COD_COMITE'; // Clave primaria de la tabla

    protected $fillable = [
        'COD_ADMIN',
        'COD_TEU',
        'COD_ELECCION',
        'CARGO_CE',
        'FECHA_INI_CE',
    ];
    
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
