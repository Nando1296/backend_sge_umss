<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Poblacion;
use App\Models\Eleccion;
use App\Models\AsociarTitularSuplente;
use Illuminate\Support\Facades\DB;

class AsociarTitularSuplenteController extends Controller
{
    public function store(Request $request)
    {
        // Valida y guarda los datos en la tabla asociar_titularSuplente
        $data = $request->validate([
            'idTS' => 'required',
            'COD_SIS' => 'required',
            'COD_COMITE' => 'required',
            'codTitular_Suplente' => 'required',
        ]);

        AsociarTitularSuplente::create($data);

        return response()->json(['message' => 'Registro creado con éxito'], 201);
    }

    public function verListaComite($idComite)
    {
        // Filtrar registros con codTitular_Suplente = 1
        $titulares = DB::table('asociar_titularSuplente')
        ->join('poblacions', 'asociar_titularSuplente.COD_SIS', '=', 'poblacions.COD_SIS')
        ->select('poblacions.CI', 'poblacions.NOMBRES', 'poblacions.APELLIDOS')
        ->where('asociar_titularSuplente.COD_COMITE', $idComite)
        ->where('asociar_titularSuplente.codTitular_Suplente', 1)
        ->get();

    // Consulta para los suplentes (codTitular_Suplente = 2)
    $suplentes = DB::table('asociar_titularSuplente')
        ->join('poblacions', 'asociar_titularSuplente.COD_SIS', '=', 'poblacions.COD_SIS')
        ->select('poblacions.CI', 'poblacions.NOMBRES', 'poblacions.APELLIDOS')
        ->where('asociar_titularSuplente.COD_COMITE', $idComite)
        ->where('asociar_titularSuplente.codTitular_Suplente', 2)
        ->get();

        // Puedes pasar los datos a una vista o devolverlos en formato JSON según tus necesidades
        //return view('lista_comite', compact('titulares', 'suplentes'));
        // O puedes devolver una respuesta JSON con los datos
         return response()->json(['titulares' => $titulares, 'suplentes' => $suplentes]);
    }


}
