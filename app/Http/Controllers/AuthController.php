<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Mostrar el formulario de registro
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }
}

