<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frente extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_FRENTE';
    protected $guarded = [];

    public function eleccion(){
        return $this->hasMany(Eleccion::class, 'COD_ELECCION');
    }

    public function candidato(){
        return $this->hasMany(Candidato::class, 'COD_CANDIDATO');
    }
}
