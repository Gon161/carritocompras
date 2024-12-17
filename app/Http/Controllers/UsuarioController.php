<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    function inicio()
    {
        return view("index");
    }

    function registro()
    {
        return view("registro");
    }

    function login()
    {
        return view("login");
    }

    function registrar(Request $datos)
    {
        $validar = $datos->validate([
            'nombre' => "required|min:3|max:32|alpha",
            'paterno' => "required|min:3|max:32|alpha",
            'materno' => "required|min:3|max:32|alpha",
            'correo' => "required|email|min:8|max:64",
            'pass' => "required|min:8|max:64",
            'pass2' => "required|min:8|max:64"
        ]);

        $usuario = Usuario::where("correo", $datos->correo)->first();
        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El usuario existe!"]);

        $usuario = Usuario::where('correo', $datos->correo)->first();

        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El correo ya se encuentra registrado!"]);

        if ($datos->pass != $datos->pass2)
            return view("registro", ["estatus" => "error", "mensaje" => "¡Las contraseñas no son iguales!"]);

        $usuario = new Usuario();
        $usuario->nombre = $datos->nombre;
        $usuario->paterno = $datos->paterno;
        $usuario->materno = $datos->materno;
        $usuario->correo = $datos->correo;
        $usuario->password = password_hash($datos->pass, PASSWORD_DEFAULT, ['cost' => 5]);

        $usuario->save();

        return view("login", ["estatus" => "success", "mensaje" => "¡Cuenta Creada!"]);
    }
}
