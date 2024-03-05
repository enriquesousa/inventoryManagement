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
                        <h4 class="mb-sm-0">Agregar <strong>Unidad</strong></h4>
                        <div class="page-title-right">

                            <a href="{{ route('list.unit') }}" class="btn btn-success waves-effect waves-light"><i class="dripicons-return"></i> Regresar a Lista de Unidades</a>

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

                            <h4 class="card-title">Agregar <strong>Unidad</strong></h4>
                            <p class="card-title-desc">Llene el campo de <code>nombre</code> con la unidad de medida que desee, Ej: Kg, Gr, L, M, Etc...</p>

                            <form id="myForm" method="post" action="{{ route('store.unit') }}" enctype="multipart/form-data">
                                @csrf


                                {{-- Nombre Unidad --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre Unidad</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" name="name" type="text">
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
                 
                   
                },
                messages: {
                    name: {
                        required: 'El campo unidad es requerido',
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
