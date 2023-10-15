<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'COD_ADMIN';
    protected $guarded = [];

    public function comiteElectoral(){
        return $this->hasOne(Comite_Electoral::class,'COD_COMITE');
    }

    public function eleccion(){
      return $this->hasMany(Eleccion::class, 'COD_ELECCION');
    }
}
