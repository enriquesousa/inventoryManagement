@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Productos</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.product') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="fas fa-plus-circle"></i> Agregar Producto</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista los <strong>Productos</strong></h4>
                            <p class="card-title-desc">Listado de <code>Productos</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Proveedor</th>
                                        <th>Unidades</th>
                                        <th>Categoría</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($products as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- ID --}}
                                            <td>{{ $item->id }}</td>

                                            {{-- Imagen --}}
                                            {{-- <td>
                                                <img src="{{ asset($item->portfolio_image) }}" style="width: 60px; height: 50px;"></td>
                                            <td> --}}

                                            {{-- Producto --}}
                                            <td>{{ $item->name }}</td>

                                            {{-- Cantidad --}}
                                            <td>{{ $item->quantity }}</td>

                                            {{-- Proveedor --}}
                                            <td>{{ $item->supplier->name }}</td>

                                            {{-- Unidades --}}
                                            <td>{{ $item->unit->name }}</td>

                                            {{-- Categoría --}}
                                            <td>{{ $item->category->name }}</td>
                                          

                                            {{-- Acciones --}}
                                            <td>
                                                {{-- Edit --}}
                                                <a href="{{ route('edit.product', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"><i class="fas fa-edit"></i></a>

                                                {{-- Details --}}
                                                {{-- <a href="{{ route('show.supplier', $item->id) }}" class="btn btn-success sm"
                                                    title="Details Data"><i class="fas fa-eye"></i></a> --}}

                                                {{-- Delete --}}
                                                <a href="{{ route('delete.product', $item->id) }}" class="btn btn-danger sm" title="Delete Data"
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
