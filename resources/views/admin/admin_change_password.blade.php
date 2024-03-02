@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                {{-- Columna 1 --}}
                <div class="col-lg-6">
                    <div class="card">
                        
                        <div class="card-body">

                            <h4 class="mb-4">Cambiar Contraseña</h4>


                            {{-- Si hay errores de validación --}}
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)

                                    {{-- <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p> --}}

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                @endforeach
                            @endif


                            <form method="POST" action="{{ route('admin.update.password') }}">
                                @csrf

                                {{-- Contraseña Antigua --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Contraseña Antigua</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="antiguaContraseña" type="password" id="antiguaContraseña">
                                    </div>
                                </div>

                                {{-- Contraseña Nueva --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Contraseña Nueva</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nuevaContraseña" type="password" id="nuevaContraseña">
                                    </div>
                                </div>

                                {{-- Confirmar Contraseña --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="confirmarContraseña" type="password" id="confirmarContraseña">
                                    </div>
                                </div>

                              

                                {{-- Botón --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Cambiar Contraseña">

                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    
@endsection
