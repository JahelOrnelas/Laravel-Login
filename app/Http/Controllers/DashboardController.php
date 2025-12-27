<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Mostrar el dashboard
     * 
     * Esta ruta está protegida por el middleware 'auth:sanctum'
     * que verifica la autenticación antes de permitir el acceso
     */
    public function index(Request $request)
    {
        // El middleware auth:sanctum ya verifica la autenticación
        // Si llegamos aquí, el usuario está autenticado
        return view('dashboard', [
            'user' => $request->user()
        ]);
    }
}

