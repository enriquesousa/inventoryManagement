@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Compras</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.purchase') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="fas fa-plus-circle"></i> Agregar Compra</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista de <strong>Compras</strong></h4>
                            <p class="card-title-desc">Listado de <code>Compras</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Compra #</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Imagen --}}
                                            {{-- <td>
                                                <img src="{{ asset($item->portfolio_image) }}" style="width: 60px; height: 50px;"></td>
                                            <td> --}}

                                            {{-- Compra # --}}
                                            <td>{{ $item->purchase_no }}</td>

                                            {{-- Fecha --}}
                                            <td>{{ $item->date }}</td>

                                            {{-- Proveedor --}}
                                            <td>{{ $item->supplier_id }}</td>

                                            {{-- Categoría --}}
                                            <td>{{ $item->category_id }}</td>

                                            {{-- Cantidad --}}
                                            <td>{{ $item->buying_qty }}</td>

                                            {{-- Producto Nombre --}}
                                            <td>{{ $item->product_id }}</td>

                                            {{-- Estatus --}}
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge rounded-pill bg-success">Aprobado</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning">Pendiente</span>
                                                @endif
                                            </td>
                                          

                                            {{-- Acciones --}}
                                            <td>

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
