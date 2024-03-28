@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            
            <div class="col-12 justify-content-center my-auto">

                {{-- Card de Información --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-3">
    
                            <form class="form-horizontal mt-3">
    
                                <div class="user-profile text-center mt-3">

                                    <div class="">

                                        {{-- <img src="{{ asset('logo/inventory.png') }}"
                                            class="rounded-circle avatar-lg img-thumbnail"
                                            alt="thumbnail"
                                        > --}}
                                        {{-- <img src="{{ asset('logo/inventory.png') }}" class="img-fluid" alt="Responsive image"> --}}

                                        <img src="{{ asset('logo/inventory.png') }}"
                                             alt="Responsive image"
                                             height="300">

                                    </div>

                                    <div class="mt-3">
                                        <h4 class="font-size-16 mb-1">Sistema Control de Inventario</h4>
                                    </div>
                                </div>
    
                                {{-- si el usuario ya ha iniciado sesión --}}
                                @if (Auth::check())
                                    <div class="form-group mt-4 mb-0 row">
                                        <div class="col-12 text-center">
                                            <p class="text-white-50">El usuario: {{ Auth::user()->name }}, ya ha iniciado
                                                sesión</p>
    
                                            <span class="text-muted">
                                                <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                                                En Linea
                                            </span>
                                            <br>
                                            <br>
                                            
                                            <a href="{{ route('admin.view.profile') }}" 
                                                class="btn btn-success">
                                                Ir a Mi Perfil
                                            </a>
                                        </div>
                                    </div>
                                @endif
    
                            </form>
    
                            <br>
                            <br>
    
    
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <img src="{{ asset('logo/eswebLogo.svg') }}" alt="" height="60">
                                    </div>
                                </div>
                            </div>
                            <br>
    
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
                    </div>
                </div>
               
            </div>

        </div>

    </div>
</div>

@endsection