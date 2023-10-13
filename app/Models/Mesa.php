<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_MESA';
    
    public function jurado(){
        return $this->hasMany(Jurado::class, 'COD_JURADO');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'COD_CARRERA');
    }

    public function comiteElectoral(){
        return $this->belongsTo(Comite_Electoral::class, 'COD_COMITE'); 
    }
}
