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
                        <h4 class="mb-sm-0">Reporte de <strong>Acreedores y Deudores</strong></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- Titulo --}}
                            <div class="row">
                                <div class="col-6" style="text-align: left;">
                                    <h4 class="card-title">Reporte de <code>Acreedores y Deudores</code></h4>
                                    {{-- <h4 class="card-title">Reporte de <strong>Proveedores y Productos</strong></h4>
                                    <p class="card-title-desc">Reporte de <code>Proveedores y Productos</code>.</p> --}}
                                </div>
                                {{-- <div class="col-6" style="text-align: right;">
                                    <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-print"></i> 
                                         Imprimir</a>
                                </div>     --}}
                            </div>

                            {{-- Seleccionar Radio Buttons Reporte de Acreedores o Deudores --}}
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <strong>Reporte Deudores</strong>
                                    <input type="radio" name="customer_wise_report" value="customer_wise_credit"
                                        class="search_value">
                                    &nbsp;&nbsp;

                                    <strong>Reporte Acreedores</strong>
                                    <input type="radio" name="customer_wise_report" value="customer_wise_paid"
                                        class="search_value">

                                </div>
                            </div>

                            {{-- Linea Separadora --}}
                            <div>
                                <hr>
                            </div>
                            <br>

                            {{-- show_credit --}}
                            <div class="show_credit" style="display: none">

                                <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm"
                                    target="_blank">

                                    <div class="row">

                                        {{-- Seleccionar Cliente --}}
                                        <div class="col-sm-8 form-group">
                                            <label for="">Nombre del Cliente</label>
                                            <select name="customer_id" class="form-select select2" aria-label="Default select example">
                                                <option value="">Seleccionar un Cliente</option>
                                                @foreach ($customers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Botón Buscar --}}
                                        <div class="col-sm-4" style="padding-top: 28px;">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>

                                    </div>

                                </form>

                            </div>

                            {{-- show_paid --}}
                            <div class="show_paid" style="display: none">

                                <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm"
                                    target="_blank">

                                    <div class="row">

                                        {{-- Seleccionar Cliente --}}
                                        <div class="col-sm-8 form-group">
                                            <label for="">Nombre del Cliente</label>
                                            <select name="customer_id" class="form-select select2" aria-label="Default select example">
                                                <option value="">Seleccionar un Cliente</option>
                                                @foreach ($customers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Botón Buscar --}}
                                        <div class="col-sm-4" style="padding-top: 28px;">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    {{-- JS para el manejo de validaciones --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({

                rules: {
                    customer_id: {
                        required: true,
                    },


                },
                messages: {
                    customer_id: {
                        required: 'Favor Seleccionar un cliente',
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

    {{-- JS para mostrar u ocultar show_credit o show_paid --}}
    <script type="text/javascript">
        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'customer_wise_credit') {
                $('.show_credit').show();
            } else {
                $('.show_credit').hide();
            }
        });

        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'customer_wise_paid') {
                $('.show_paid').show();
            } else {
                $('.show_paid').hide();
            }
        });
    </script>


@endsection
