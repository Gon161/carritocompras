<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function inicio(){
        return view("index");
    }
    function registro(){
        return view("registro");
    }
    function login(){
        return view("login");
    }
}
