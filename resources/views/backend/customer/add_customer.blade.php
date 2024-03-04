@extends('admin.admin_master')
@section('admin')

    {{-- Jquery CDN Para poder usar JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Agregar <strong>Cliente</strong></h4>
                        <div class="page-title-right">

                            <a href="{{ route('list.customer') }}" class="btn btn-success waves-effect waves-light"><i class="dripicons-return"></i> Regresar a Lista de Clientes</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                {{-- Columna 1 --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Agregar <strong>Cliente</strong></h4>
                            <p class="card-title-desc">Llene el <code>formulario</code> para agregar un nuevo Cliente.</p>

                            <form id="myForm" method="post" action="{{ route('store.customer') }}" enctype="multipart/form-data">
                                @csrf


                                {{-- Nombre Cliente --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre Cliente</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>

                                {{-- Teléfono --}}
                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="mobile_no" type="text">
                                    </div>
                                </div>

                                {{-- Correo Electrónico --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="email" type="email">
                                    </div>
                                </div>

                                {{-- Dirección --}}
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Dirección</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="address" type="text">
                                    </div>
                                </div>

                                {{-- Seleccionar Imagen --}}
                                <div class="row mb-3">
                                    <label for="customer_image" class="col-sm-2 col-form-label">Seleccionar Imagen</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="customer_image" type="file" id="image">
                                    </div>
                                </div>

                                {{-- Display Image --}}
                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-lg" 
                                            src="{{ url('upload/no_image.jpg') }}"
                                            data-holder-rendered="true">

                                    </div>
                                </div>


                                {{-- Guardar --}}
                                <div class="row mb-3">
                                    <label for="portfolio_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ri-save-3-line"></i> Guardar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    {{-- JS para el manejo de validaciones --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    customer_image: {
                        required: true,
                    },
                   
                },
                messages: {
                    name: {
                        required: 'El nombre del proveedor es requerido',
                    },
                    mobile_no: {
                        required: 'El número de teléfono es requerido',
                    },
                    email: {
                        required: 'El correo electrónico es requerido',
                    },
                    address: {
                        required: 'La dirección es requerida',
                    },
                    customer_image: {
                        required: 'Favor de seleccionar una imagen',
                    },
                    
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    {{-- JS para el manejo de imagenes --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
