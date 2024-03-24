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
                        <h4 class="mb-sm-0">Lista de Facturas por <strong>Mes y Año</strong></h4>
                        <div class="page-title-right">
                            <a href="{{ route('todas.invoice') }}" 
                                class="btn btn-success waves-effect waves-light">
                                <i class="ri-list-check"></i>
                                Facturas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        {{-- Seleccionar año y Mes --}}
                        <div class="card-body">

                            <h4 class="card-title">Lista de Facturas por <strong>Mes y Año</strong></h4>
                            <p class="card-title-desc">Entre un <code>Año y Mes</code> para ver la lista de facturas.</p>

                            <form action="{{ route('facturas.por.mes') }}" method="GET" id="myForm">

                                <div class="row">

                                    {{-- Seleccionar Año --}}
                                    <div class="col-md-3">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">Año</label>
                                            <select name="año" class="form-select select2" aria-label="Default select example">
                                                <option selected="selected">{{ date('Y') }}</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Seleccionar Mes --}}
                                    <div class="col-md-3">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">Mes</label>
                                            <select name="mes" class="form-select select2" aria-label="Default select example">
                                                <option selected=""></option>
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    {{-- Botón Buscar --}}
                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label" style="margin-top: 43px;"></label>
                                            <button type="submit" class="btn btn-info">Buscar</button>
                                        </div>
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
                    año: {
                        required: true,
                    },
                    mes: {
                        required: true,
                    },
                    
                   
                },
                messages: {
                    año: {
                        required: 'El año es requerido',
                    },
                    mes: {
                        required: 'El mes es requerido',
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

@endsection
