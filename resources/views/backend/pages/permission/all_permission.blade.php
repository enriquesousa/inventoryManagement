@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        
                        <h4 class="mb-sm-0">Lista de <strong>Roles y Permisos</strong></h4>

                        {{-- Botones al centro --}}
                        <div class="page-title-center">

                            <a href="{{ route('list.invoice') }}"
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
                            </a>

                        </div>

                        {{-- Botones al lado derecha --}}
                        <div class="page-title-right">
                            <a href="{{ route('add.invoice') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="fas fa-plus-circle"></i> Agregar Factura</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista de <strong>Roles y Permisos</strong></h4>
                            <p class="card-title-desc">Listado de todos los <code>Roles y Permisos</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th width="5%">Serie</th>
                                        <th width="20%">Rol</th>
                                        <th>Permiso</th>
                                        <th width="10%">Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($permissions as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Rol --}}
                                            <td>{{ $item->name }}</td>

                                            {{-- Permiso --}}
                                            <td>{{ $item->group_name }}</td>

                                         
                                            {{-- Acción --}}
                                            <td>

                                                <a href="{{ route('edit.product', $item->id) }}"
                                                    class="btn btn-info" title="Editar Permisos">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.product', $item->id) }}"
                                                    class="btn btn-danger" id="delete" title="Eliminar Rol">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
