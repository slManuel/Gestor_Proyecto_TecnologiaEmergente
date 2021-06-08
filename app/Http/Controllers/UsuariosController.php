<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\EncryptException;

class UsuariosController extends Controller
{
    public function index()
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $rol = $_SESSION["rol"];
        if ($rol == "Administrador") {
            $data['usuarios'] = User::get();
            return view('Usuarios.usuarios', $data);
        } else {
            echo '<script language="javascript">alert("No posees permisos de administración");</script>';
            return view('home');
        }
    }
    public function inactivo()
    {
        return view('usuarios.inactivo');
    }

    public function create()
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        return view('usuarios.createUsuarios');
    }

    public function update(Request $request, $id)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $nombre = trim($request->name);
        $correo = trim($request->email);
        $original = $request->original;
        if ($nombre != "" && $correo != "") {
            if ($original == $correo) {
                $usuario = User::findOrFail($id);
                $usuario->update($request->all());
                $data['usuarios'] = User::all();
                return view('Usuarios.usuarios', $data);
            } else {
                $existe = User::Existe($correo)->get();
                if ($existe == "[]") {
                    $usuario = User::findOrFail($id);
                    $usuario->update($request->all());
                    $data['usuarios'] = User::all();
                    return view('Usuarios.usuarios', $data);
                } else {
                    echo '<script language="javascript">alert("Al parecer ya hay un usuario con ese correo, intente nuevamente");</script>';
                    $data['usuarios'] = User::all();
                    return view('Usuarios.usuarios', $data);
                }
            }
        } else {
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            return view('usuarios.createUsuarios');
        }
    }

    public function cambiarcontrasena(Request $request, $id)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if (trim($request->password) != "") {
            $usuario = User::findOrFail($id);
            $usuario->password = password_hash($request->password, PASSWORD_DEFAULT);
            $usuario->save();
            $data['usuarios'] = User::get();
            return view('Usuarios.usuarios', $data);
        } else {
            echo '<script language="javascript">alert("La contraseña no puede quedar en blanco. Intentelo de nuevo");</script>';
            $data['usuarios'] = User::get();
            return view('Usuarios.usuarios', $data);
        }
    }

    public function store(Request $request)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $contra = trim($request->password);
        $contra2 = trim($request->confirmar);
        $nombre = trim($request->name);
        if ($nombre != "") {
            if ($contra == $contra2) {
                $existe = User::Existe(trim($request->email))->get();
                if ($existe == "[]") {
                    $encriptada = password_hash($contra, PASSWORD_DEFAULT);
                    User::insert([
                        'name' => $nombre,
                        'email' => trim($request->email),
                        'password' => $encriptada,
                        'rol' => $request->rol,
                        'estado' => $request->estado
                    ]);
                    $data['usuarios'] = User::get();
                    return view('Usuarios.usuarios', $data);
                } else {
                    echo '<script language="javascript">alert("Al parecer este correo ya ha sido registrado anteriormente, intente nuevamente");</script>';
                    $data['usuarios'] = User::get();
                    return view('Usuarios.usuarios', $data);
                }
            } else {
                echo '<script language="javascript">alert("La contraseña no coincide, intente de nuevo");</script>';
                $data['usuarios'] = User::get();
                return view('Usuarios.usuarios', $data);
            }
        }
    }
}
