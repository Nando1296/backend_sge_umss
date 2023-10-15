<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite_Electoral;
use App\Models\Eleccion;
use App\Models\Poblacion;
use App\Models\AsociarTitularSuplente;
use Illuminate\Support\Facades\DB;



class ComiteElectoralController extends Controller
{




    
    public function asignarComite($COD_ELECCION)
    {
        // Obtén la información de la elección
        $eleccion = Eleccion::where('COD_ELECCION', $COD_ELECCION)->first();
    
        if ($eleccion) {
            // Paso 1: Obtén la lista de COD_SIS de asociar_titularSuplente para el comité actual
            $asignados = DB::table('asociar_titularSuplente')
                ->pluck('COD_SIS')
                ->toArray();
    
            // Paso 2: Filtra docentes y estudiantes cuyos COD_SIS no estén en la lista de asignados
            $docentes = Poblacion::where('DOCENTE', 1)
                ->whereNotIn('COD_SIS', $asignados)
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $estudiantes = Poblacion::where('ESTUDIANTE', 1)
                ->whereNotIn('COD_SIS', $asignados)
                ->inRandomOrder()
                ->limit(4)
                ->get();
    
            // Asigna el COD_COMITE de la elección a los registros obtenidos en el paso 2
            foreach ($docentes as $docente) {
                $docente->update(['COD_COMITE' => $eleccion->COD_COMITE]);
             
            }
    
            foreach ($estudiantes as $estudiante) {
                $estudiante->update(['COD_COMITE' => $eleccion->COD_COMITE]);
                
            }
    
            return response()->json(['message' => 'Asignación de comité exitosa']);
        } else {
            return response()->json(['error' => 'Election not found'], 404);
        }
    }
    
    


}
