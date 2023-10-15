<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Eleccion;
use Illuminate\Support\Facades\DB;

class EleccionController extends Controller
{
    public function index()
{
    $elecciones = Eleccion::all();

    return response()->json($elecciones);
}


use App\Http\Requests\validarEleccion;
use Illuminate\Http\Request;
use App\Models\Eleccion;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones = Eleccion::all();

        if($elecciones->isEmpty()){
            return response()->json(['error' => 'No se encontraron procesos electorales.'], 404);
        }

        return response()->json($elecciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eleccion = new Eleccion([
            'COD_ADMIN' => $request->COD_ADMIN,
            'COD_FRENTE' => $request->COD_FRENTE,
            'COD_TEU' => $request->COD_TEU,
            'COD_COMITE' => $request->COD_COMITE,
            'MOTIVO_ELECCION' => $request->MOTIVO_ELECCION,
            'FECHA_INI_CONVOCATORIA' => $request->FECHA_INI_CONVOCATORIA,
            'FECHA_FIN_CONVOCATORIA' => $request->FECHA_FIN_CONVOCATORIA,
            'FECHA_ELECCION' => $request->FECHA_ELECCION,
        ]);

        $eleccion->save();


        return response()->json(['message' => 'Proceso electoral creado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleccion = Eleccion::find($id);

        if(!$eleccion){
            return response()->json(['error' => 'El proceso electoral no se encontró.', 404]);
        }

        return response()->json($eleccion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eleccion = Eleccion::find($id);

        if(!$eleccion){
            return response()->json(['error' => 'El proceso electoral no se encontró.'], 404);
        }


        $eleccion->update([
        'MOTIVO_ELECCION' => $request->MOTIVO_ELECCION,
        'FECHA_INI_CONVOCATORIA' => $request->FECHA_INI_CONVOCATORIA,
        'FECHA_FIN_CONVOCATORIA' => $request->FECHA_FIN_CONVOCATORIA,
        'FECHA_ELECCION' => $request->FECHA_ELECCION,
        ]);

        return response()->json(['message' => 'Proceso electoral actualizado correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
