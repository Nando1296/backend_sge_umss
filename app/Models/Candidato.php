<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_CANDIDATO';
    protected $guarded = [];

    public function frente(){
        return $this->belongsTo(Frente::class, 'COD_FRENTE');
    }

    public function poblacion(){
        return $this->hasOne(Poblacion::class, 'COD_SIS');
    }
}
