<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsociarTitularSuplente extends Model
{
    use HasFactory;

    protected $table = 'asociar_titularSuplente';

    protected $fillable = [
        'idTS',
        'COD_SIS',
        'COD_COMITE',
        'codTitular_Suplente',
    ];
}
