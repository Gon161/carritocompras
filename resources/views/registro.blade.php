@extends('layouts.usuario')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('indice')
    
@endsection

@section('contenido')
<div class="row pt-5 mt-5 shadow">
    <div class="col-md-5 mx-auto">
    <div class=" mb-3 ">
                        <div class="col-md-12 text-center">
                            <h1 class="titulo">Inicio De Sesión</h1>
                        </div>
                    </div>
                    <form action="{{route('registro.form')}}" method="post">
                        {{csrf_field()}}
                        @if(isset($estatus))
                            @if($estatus == "success")
                                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
                            @elseif($estatus == "error")
                                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
                            @endif
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-user-friends"></i></span>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                                       aria-label="nombre" aria-describedby="addon-wrapping">
                            </div>
                            <div class="form-group">
                                <label for="correo">Apelldo Paterno:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="text" name="paterno" id="paterno" class="form-control"
                                           placeholder="Apelldo Paterno"
                                           aria-label="paterno" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="materno">Apelldo Materno:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="text" name="materno" id="materno" class="form-control"
                                           placeholder="Apelldo Materno"
                                           aria-label="paterno" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-at"></i></span>
                                    <input
                                        type="email" name="correo" id="correo" class="form-control"
                                        placeholder="Correo"
                                        aria-label="correo" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password" name="pass" id="pass" class="form-control"
                                           placeholder="Contraseña" aria-label="pass" aria-describedby="pass">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                                onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass2">Confirma Contraseña:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password" name="pass2" id="pass2" class="form-control"
                                           placeholder="Confirma tu contraseña" aria-label="pass" aria-describedby="password">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                                onclick="mostrarPassword2()"><span class="fa fa-eye-slash icon2"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Campo de selección del grupo -->
                    
                            <div class="col-md-12 text-center ">
                                <button type="submit" id="btnIniciar" class="btn btn-block mybtn btn-primary tx-tfm">
                                    Registrar
                                </button>
                            </div>
                            <div class="form-group text-center">
                                ¿Tienes una cuenta? <a href="{{route('login')}}" class="recuperar">
                                    Inicia Sesion</a>
                            </div>
                            @if(isset($_GET["r"]))
                                <input type="hidden" name="url" value="{{$_GET["r"]}}">
                        @endif
                    </form>
    </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("pass");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
    function mostrarPassword2() {
        var cambio = document.getElementById("pass2");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>
@endsection