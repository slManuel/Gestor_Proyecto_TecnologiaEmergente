<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $rol = $_SESSION["rol"];
        if ($rol == "Administrador") {
            $data['usuarios']=User::get(); 
            return view('Usuarios.usuarios', $data);
        }else{
            echo "No posees permisos de administrador";
        }
    }
}
