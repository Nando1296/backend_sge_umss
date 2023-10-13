<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_CARRERA';

    public function mesa(){
        return $this->hasMany(Mesa::class, 'COD_MESA');
    }

    public function poblacion(){
        return $this->hasMany(Poblacion::class, 'COD_SIS');
    }
}
