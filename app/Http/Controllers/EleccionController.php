<?php

namespace App\Http\Controllers;

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

        return response()->json($elecciones, 50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validarEleccion $request)
    {
        $eleccion = new Eleccion([
            'MOTIVO_ELECCION' => $request->MOTIVO_ELECCION,
            'FECHA_INI_ELECCION' => $request->FECHA_INI_ELECCION,
            'FECHA_FIN_ELECCION' => $request->FECHA_FIN_ELECCION,
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
    public function update(validarEleccion $request, $id)
    {
        $eleccion = Eleccion::find($id);

        if(!$eleccion){
            return response()->json(['error' => 'El proceso electoral no se encontró.'], 404);
        }


        $eleccion->update([
        'MOTIVO_ELECCION' => $request->MOTIVO_ELECCION,
        'FECHA_INI_ELECCION' => $request->FECHA_INI_ELECCION,
        'FECHA_FIN_ELECCION' => $request->FECHA_FIN_ELECCION,
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