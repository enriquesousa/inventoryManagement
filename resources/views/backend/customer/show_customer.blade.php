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
                        <h4 class="mb-sm-0">Detalles <strong>Cliente</strong></h4>
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

                            <h4 class="card-title">Detalles <strong>Cliente</strong></h4>
                            <p class="card-title-desc">Ver detalles del <code>Cliente</code>.</p>

                            <form>

                                {{-- Nombre Cliente --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre Cliente</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="name" type="text" value="{{ $customer->name }}" readonly>
                                    </div>
                                </div>

                                {{-- Teléfono --}}
                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="mobile_no" type="text" value="{{ $customer->mobile_no }}" readonly>
                                    </div>
                                </div>

                                {{-- Correo Electrónico --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="email" type="email" value="{{ $customer->email }}" readonly>
                                    </div>
                                </div>

                                {{-- Dirección --}}
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Dirección</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="address" type="text" value="{{ $customer->address }}" readonly>
                                    </div>
                                </div>

                                {{-- Created by --}}
                                <div class="row mb-3">
                                    <label for="created_by" class="col-sm-2 col-form-label">Creado Por</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="created_by" type="text" value="{{ $customer->created_by }}" readonly>
                                    </div>
                                </div>

                                {{-- updated by --}}
                                <div class="row mb-3">
                                    <label for="updated_by" class="col-sm-2 col-form-label">Actualizado Por</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="updated_by" type="text" value="{{ $customer->updated_by }}" readonly>
                                    </div>
                                </div>

                                {{-- created at --}}
                                <div class="row mb-3">
                                    <label for="created_at" class="col-sm-2 col-form-label">Creado</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="created_at" type="text" value="{{ $customer->created_at }}" readonly>
                                    </div>
                                </div>


                                {{-- Display Image --}}
                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-lg" 
                                            src="{{ asset($customer->customer_image) }}"
                                            data-holder-rendered="true">

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
