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

}
