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

                        <h4 class="mb-sm-0">Agregar <strong>Permiso</strong></h4>

                        {{-- Botones al centro --}}
                        <div class="page-title-center">

                            {{-- <a href="{{ route('list.invoice') }}"
                                class="btn btn-success waves-effect waves-light">
                                <i class="ri-list-check"></i>
                                Solo Aprobadas
                            </a>

                            <a href="{{ route('pending.list.invoice') }}" 
                                class="btn btn-success waves-effect waves-light">
                                <i class="ri-list-check"></i>
                                Aprobar Factura
                            </a> 
                            
                            <a href="{{ route('por.mes.invoice') }}" 
                                class="btn btn-success waves-effect waves-light">
                                <i class="ri-filter-line"></i>
                                Por Mes
                            </a> --}}

                        </div>

                        {{-- Botones al lado derecha --}}
                        <div class="page-title-right">
                            <a href="{{ route('all.permission') }}" class="btn btn-success waves-effect waves-light">
                                <i class="ri-list-check"></i>
                                Todos los Permisos
                            </a>
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

                            <h4 class="card-title">Agregar <strong>Permiso</strong></h4>
                            <p class="card-title-desc">
                                Llene el <code>formulario</code> para agregar un Permiso. 
                                Los nombres de los permisos, por ejemplo <code>proveedores.menu</code> son exclusivos para el sistema, no puedes cambiar el nombre del permiso, ya que son exclusivos para el sistema. El nombre del grupo si lo puedes modificar si gustas. Como ejemplo, para el grupo de permisos de  <code>Proveedores</code> para el sistema, pueden ser los nombres <code>proveedor.menu</code> o <code>proveedor.all</code> o <code>proveedor.add</code> o <code>proveedor.edit</code> o <code>proveedor.delete</code>.
                            </p>

                            <form id="myForm" method="post" action="{{ route('store.permission') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- Select Grupo de Permisos 'group_name' --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="group_name" class="form-label">Grupo</label>
                                            <select name="group_name" class="form-select">
                                                <option selected disabled>Seleccionar Grupo</option>

                                                <option value="panel">Panel</option>
                                                <option value="proveedores">Proveedores</option>
                                                <option value="clientes">Clientes</option>
                                                <option value="unidades">Unidades</option>
                                                <option value="categorías">Categorías</option>
                                                <option value="productos">Productos</option>
                                                <option value="compras">Compras</option>
                                                <option value="facturas">Facturas</option>
                                                <option value="rep_inventario">Rep. Inventario</option>
                                                <option value="rep_facturas">Rep. Facturas</option>
                                                <option value="roles_permisos">Roles y Permisos</option>

                                            </select>
                                        </div>
                                    </div>

                                    {{-- Nombre del Permiso 'name' --}}
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Nombre del Permiso</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>

                                </div> <!-- end row -->

                                {{-- botón Guardar --}}
                                <div class="text-begin">
                                    <button type="submit" 
                                        class="btn btn-success waves-effect waves-light mt-2">
                                        <i class="mdi mdi-content-save"></i>
                                        Guardar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Js para el manejo de la validación de la forma --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Favor de Ingresar el Nombre del Permiso',
                    },
                    group_name: {
                        required: 'Favor de Seleccionar un Grupo',
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
