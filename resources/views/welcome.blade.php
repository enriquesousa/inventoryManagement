<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Lock screen | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

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

    <!-- toastr toster-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="auth-body-bg">

    <div class="bg-overlay"></div>

    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">

                <div class="card-body">

                    <div class="p-3">

                        <form class="form-horizontal mt-3">

                            {{-- avatar --}}
                            {{-- <div class="text-center mb-4">
                                    <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="thumbnail">
                                </div> --}}

                            <div class="user-profile text-center mt-3">
                                <div class="">
                                    <img src="{{ asset('logo/inventory.png') }}"class="rounded-circle avatar-lg img-thumbnail"
                                        alt="thumbnail">
                                </div>
                                <div class="mt-3">
                                    <h4 class="font-size-16 mb-1">Sistema Control de Inventario</h4>
                                </div>
                                {{-- <div class="text-center">
                                    <a href="{{ url('https://gorgeous-puppy-eb536f.netlify.app/laravel/realestate/s03-multiauthbreeze/') }}" target="_blank">Ayuda</a>
                                </div> --}}
                            </div>

                            {{-- si el usuario ya ha iniciado sesión --}}
                            @if (Auth::check())
                                <div class="form-group mt-4 mb-0 row">
                                    <div class="col-12 text-center">
                                        <p class="text-white-50">El usuario: {{ Auth::user()->name }}, ya ha iniciado
                                            sesión</p>

                                        <span class="text-muted"><i
                                                class="ri-record-circle-line align-middle font-size-14 text-success"></i>En
                                            Linea</span>
                                        <br>
                                        <br>
                                        <a href="{{ route('dashboard') }}" class="btn btn-success">Ir a Panel de
                                            Control</a>
                                    </div>
                                </div>
                            @endif

                            {{-- Botón Login --}}
                            <div class="form-group text-center row mt-3">
                                <div class="col-12">
                                    @if (Auth::check())
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="btn btn-info w-100 waves-effect waves-light">Iniciar Sesión</a>
                                    @endif
                                </div>
                            </div>

                            {{-- Botón Registrarse --}}
                            <div class="form-group text-center row mt-3">
                                <div class="col-12">
                                    @if (Auth::check())
                                    @else
                                        <a href="{{ route('register') }}"
                                            class="btn btn-info w-100 waves-effect waves-light">Registrarse</a>
                                    @endif
                                </div>
                            </div>


                        </form>

                        <br>

                        <div id="accordion" class="custom-accordion">

                            <div class="card mb-1 shadow-none">
                                <a href="#collapseOne" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                    <div class="card-header btn btn-warning w-100 waves-effect waves-light" id="headingOne">
                                        <h6 class="text-center mb-0">
                                            Ayuda
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h6>
                                    </div>
                                </a>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                    <div class="card-body">
                                        Para ingresar al sistema es necesario iniciar sesión, para utilizar el sistema en modo <strong>Demo</strong> puede iniciar sesión con las siguientes credenciales: <br>
                                        <br>
                                        <strong>Usuario: </strong>demo<br>
                                        <strong>Contraseña: </strong>demo
                                    </div>
                                </div>
                            </div>

                        </div>

                            


                        <br>


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="{{ asset('logo/eswebLogo.svg') }}" alt="" height="60">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-sm-12 text-center">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>© EsWeb.
                                </div>
                                <br>
                                <div class="col-sm-12">
                                    <div class="text-center d-none d-sm-block">
                                        Creado con <i class="mdi mdi-heart text-danger"></i> por EsWeb
                                    </div>
                                </div>

                            </div>
                        </div>




                        {{-- Footer: Version de Laravel y PHP --}}
                        <div class="form-group row mt-4">
                            <div class="text-center">
                                <small class="text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                                    (PHP v{{ PHP_VERSION }})</small>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    {{-- Toastr Code toster --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ", "Información!");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ", "Éxito!");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ", "Advertencia!");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ", "Error!");
                    break;
            }
        @endif
    </script>

</body>

</html>
