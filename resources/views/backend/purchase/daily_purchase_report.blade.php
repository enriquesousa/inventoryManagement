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
                        <h4 class="mb-sm-0">Reporte de Compras por <strong>Rango de Fechas</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('list.purchase') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="dripicons-return"></i> Regresar a Lista de Compras</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        {{-- Datos de la Factura --}}
                        <div class="card-body">

                            <h4 class="card-title">Reporte de Compras por <strong>Rango de Fechas</strong></h4>
                            <p class="card-title-desc">Entre un <code>rango de fechas</code> para ver un reporte de compras realizadas.</p>


                            <form action="{{ route('daily.purchase.pdf') }}" method="GET" id="myForm" target="_blank">

                                <div class="row">

                                    {{-- Fecha de Inicio --}}
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">Fecha de Inicio</label>
                                            <input class="form-control example-date-input" name="start_date" type="date"
                                                id="start_date" placeholder="YY-MM-DD">
                                        </div>
                                    </div>

                                    {{-- Fecha de Final --}}
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">Fecha Final</label>
                                            <input class="form-control example-date-input" name="end_date" type="date"
                                                id="end_date" placeholder="YY-MM-DD">
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
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                    
                   
                },
                messages: {
                    start_date: {
                        required: 'La fecha de inicio es requerida',
                    },
                    end_date: {
                        required: 'La fecha final es requerida',
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
