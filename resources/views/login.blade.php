@extends('layouts.usuario')

@section('titulo')
    <title>Login</title>
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
                    <form action="{{route('login.form')}}" method="post">
                        {{csrf_field()}}
                        @if(isset($estatus))
                            @if($estatus == "success")
                                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
                            @elseif($estatus == "error")
                                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
                            @endif
                        @endif
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-user-friends"></i></span>
                                <input type="text" name="correo" id="correo" class="form-control"
                                       placeholder="Correo o Usuario"
                                       aria-label="correo" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                                <input type="password" name="pass" id="pass" class="form-control"
                                       placeholder="password" aria-label="password" aria-describedby="password">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" type="button"
                                            onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--        <div class="form-group text-right">
                                    <a href="" class="recuperar">
                                        ¿Olvidaste tu contraseña?</a>
                                </div>-->


                        <div class="col-md-12 text-center ">
                            <button type="submit" id="btnIniciar" class="btn btn-block mybtn btn-primary tx-tfm">Iniciar
                                Sesión
                            </button>
                        </div>
                        <div class="form-group text-center">
                            No tienes cuenta <a href="{{route('registro')}}" class="recuperar">
                                Registrate aquí</a>
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