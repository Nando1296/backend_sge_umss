<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    use HasFactory;
    protected $keyType = 'integer';
    protected $primaryKey = 'COD_JURADO';
    protected $guarded = [];

    public function poblacion(){
        return $this->hasOne(Poblacion::class, 'COD_SIS');
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class, 'COD_MESA');
    }
}
