<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poblacion;
use App\Models\AsociarTitularSuplente;
use Illuminate\Support\Facades\DB;

class PoblacionController extends Controller
{
    public function asignarVocales($COD_COMITE) {
        // Filtrar 6 docentes y 4 estudiantes de forma aleatoria en base al COD_COMITE
        $docentes = Poblacion::inRandomOrder()
            ->where('DOCENTE', 1)
            ->where('COD_COMITE', $COD_COMITE)
            ->limit(6)
            ->get();

        $estudiantes = Poblacion::inRandomOrder()
            ->where('ESTUDIANTE', 1)
            ->where('COD_COMITE', $COD_COMITE)
            ->limit(4)
            ->get();

        // Dividir los docentes y estudiantes en dos arrays (3 docentes y 2 estudiantes en cada uno)
        $array1 = $docentes->take(3)->concat($estudiantes->take(2));
        $array2 = $docentes->skip(3)->concat($estudiantes->skip(2));

        // Asignar codTitular_Suplente = 1 a los elementos de $array1
        foreach ($array1 as $element) {
            AsociarTitularSuplente::create([
                'COD_SIS' => $element->COD_SIS,
                'COD_COMITE' => $COD_COMITE,
                'codTitular_Suplente' => 1
            ]);
        }

        // Asignar codTitular_Suplente = 2 a los elementos de $array2
        foreach ($array2 as $element) {
            AsociarTitularSuplente::create([
                'COD_SIS' => $element->COD_SIS,
                'COD_COMITE' => $COD_COMITE,
                'codTitular_Suplente' => 2
            ]);
        }

        // Puedes agregar lógica adicional si es necesario

        return response()->json(['message' => 'Datos registrados en la tabla asociar_titularSuplente']);
    }
}
