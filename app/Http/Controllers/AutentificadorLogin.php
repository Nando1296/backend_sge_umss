<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AutentificadorLogin extends Controller
{

    public function login(Request $request)
    {
        $cod_admin = $request->input('cod_admin');
        $contrasena_admin = $request->input('contrasena_admin');
    
        // Realiza la consulta SQL
        $user = DB::table('administradors')
            ->select('cod_admin')
            ->where('cod_admin', $cod_admin)
            ->where('CONTRASENA_ADMIN', $contrasena_admin)
            ->first();
    
        if ($user) {
            // El usuario fue encontrado en la base de datos
            return response()->json(['message' => 'Inicio de sesión exitoso']);
        }
    
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}
