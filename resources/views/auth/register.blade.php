<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Regístrate | Basic Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Basic Blog Demo" name="Basic Blog Demo" />

    {{-- {{ asset('backend/') }} --}}

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    {{-- Logo --}}
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="{{ route('home') }}" class="auth-logo">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30"
                                    class="logo-dark mx-auto" alt="">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30"
                                    class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    {{-- Titulo --}}
                    <h4 class="text-muted text-center font-size-18"><b>Forma de Registro</b></h4>

                    <div class="p-3">

                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Nombre 'name' --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        type="text" name="name" required="" placeholder="Nombre Completo">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Nombre de Usuario Corto 'username' --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('username') is-invalid @enderror" id="username"
                                        type="text" name="username" required=""
                                        placeholder="Nombre de Usuario Corto">
                                    @error('username')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Correo electrónico 'email' --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        type="email" name="email" required="" placeholder="Correo electrónico">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Contraseña 'password' --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                        type="password" name="password" required="" placeholder="Entre contraseña">
                                    @error('password')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirmar Contraseña 'password_confirmation' --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" type="password" name="password_confirmation"
                                        required="" placeholder="Confirme su contraseña">
                                    @error('password_confirmation')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>



                            {{-- términos y condiciones --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1 fw-normal" for="customCheck1">Acepto <a
                                                href="#" class="text-muted">los términos y condiciones</a></label>
                                    </div>
                                </div>
                            </div>

                            {{-- Botón Registrarse --}}
                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Registrarse</button>
                                </div>
                            </div>

                            {{-- ¿Ya tienes cuenta? --}}
                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">¿Ya tienes cuenta?</a>
                                </div>
                            </div>

                        </form>
                        <!-- end form -->


                        {{-- Botón Regresar al inicio --}}
                        <div class="flex items-center justify-end mt-2">
                            <a href="{{ route('home') }}" class="ms-2 text-sm text-gray-600">Regresar a Inicio</a>
                        </div>
                        

                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>
