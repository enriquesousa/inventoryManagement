@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Clientes</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.customer') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="fas fa-plus-circle"></i> Agregar Cliente</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista datos de los <strong>Clientes</strong></h4>
                            <p class="card-title-desc">Listado de <code>Clientes</code> incluyendo que persona dio de
                                alta e imagen del cliente.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Cliente</th>
                                        <th>Imagen</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Estatus</th>
                                        <th>Creado por</th>
                                        <th>Actualizado por</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($customers as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Cliente --}}
                                            <td>{{ $item->name }}</td>

                                            {{-- Imagen --}}
                                            <td>
                                                <img src="{{ asset($item->customer_image) }}" style="width: 60px; height: 50px;">
                                            </td>

                                            {{-- Correo --}}
                                            <td>{{ $item->email }}</td>

                                            {{-- Teléfono --}}
                                            <td>{{ $item->mobile_no }}</td>

                                            {{-- Status --}}
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge rounded-pill bg-success">Activo</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Inactivo</span>
                                                @endif
                                            </td>

                                            {{-- Creado por --}}
                                            <td>{{ $item->created_by }}</td>

                                            {{-- Actualizado por --}}
                                            <td>{{ $item->updated_by }}</td>

                                            {{-- Acciones --}}
                                            <td>
                                                {{-- Edit --}}
                                                <a href="{{ route('edit.customer', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"><i class="fas fa-edit"></i></a>

                                                {{-- Details --}}
                                                <a href="{{ route('show.customer', $item->id) }}" class="btn btn-success sm"
                                                    title="Details Data"><i class="fas fa-eye"></i></a>

                                                {{-- Delete --}}
                                                <a href="{{ route('delete.supplier', $item->id) }}" class="btn btn-danger sm" title="Delete Data"
                                                    id="delete"><i class="fas fa-trash-alt"></i></a>
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
