@extends('sources-auth')

@section('title')

<!-- Website Title -->
<title>SICRADEPMA23 - ESCUELA PRESIDENTE MEDINA ANGARITA</title>

@endsection

@section('content')

  <header id="header" class="ex-2-header" style='
    background-image: url("{{ asset('static/images/bg-login.jpg') }}"); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-color: rgba(0, 0, 0, 0.2);
    background-blend-mode: multiply; /* Este es el cambio clave */
'> 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Iniciar Sesión</h1>
                   <p>¿Olvidaste tu contraseña? <a class="white" href="#">Recuperar contraseña</a></p> 
                    <!-- Sign Up Form -->
                    <div class="form-container mb-5">

                        <div class="text-center mb-4">
                            <a class="navbar-brand logo-image text-decoration-none" href="{{ route('index') }}"><img src="{{ asset('static/images/gorro-4.png') }}" alt="alternative" width="35" height="35" class="mr-1"><strong class="blue"><h4 class="d-inline">SICRADEPMA23</strong></h4></a>
                        </div>

                        <form method="POST" action="{{ route('auth-login') }}">
                            <div class="form-group">
                                <input type="email" class="form-control-input" name='email' id="lemail" required>
                                <label class="label-control" for="lemail">Correo Electronico / Usuario</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="lpassword" name="password" required>
                                <label class="label-control" for="lpassword">Contraseña</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Iniciar Sesión</button>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>

                            @csrf
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

@endsection