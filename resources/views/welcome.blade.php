<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Upcube - Admin & Dashboard Template</title>
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
    <div class="page-content">
        <div class="container-fluid">

            {{-- Logo EsWeb --}}
            <center>
                <img src="{{ asset('logo/logo.svg') }}" alt="" width="100">
            </center>

            <br><br>

            {{-- si el usuario ya ha iniciado sesión --}}
            @if (Auth::check())
                <p class="text-white-50">El usuario: {{ Auth::user()->name }}, ya ha iniciado sesión</p>
                <a href="{{ route('dashboard') }}" class="btn btn-success">Ir al Panel de Control</a>
            @endif

            <div class="row mt-5">

                {{-- Columna 1 --}}
                <div class="col-md-3">

                </div><!-- end col -->

                {{-- Columna 2 --}}
                <div class="col-md-3">
                    <center>
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('logo/inicia.png') }}" alt="" width="150">
                        </a>
                    </center>
                </div><!-- end col -->

                {{-- Columna 3 --}}
                <div class="col-md-3">
                    <center>
                        <a href="{{ route('register') }}">
                            <img src="{{ asset('logo/registra.png') }}" alt="" width="150">
                        </a>
                    </center>
                </div><!-- end col -->

                {{-- Columna 4 --}}
                <div class="col-md-3">

                </div><!-- end col -->

            </div>
            <!-- end row -->

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                    <p>© {{ date('Y') }}. Todos los derechos reservados</p>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


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
