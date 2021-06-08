<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            
            return view('usuarios.inactivo');
        }
        return view('home');
    }
}
