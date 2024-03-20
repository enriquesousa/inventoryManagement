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

                            <a href="{{ route('add.purchase') }}" class="btn btn-success waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>
                                 Agregar Compra</a>

                            <a href="{{ route('list.product') }}" class="btn btn-success waves-effect waves-light">
                                <i class="ri-file-list-line"></i>
                                 Lista de Productos</a>                                    

                            <a href="{{ route('pending.purchase') }}" class="btn btn-success waves-effect waves-light">
                                <i class="fas fa-check-circle"></i>
                                 Aprobar Compras</a>

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

                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th width="5%">Serie</th>
                                        <th width="5%">Compra #</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Categoría</th>
                                        <th width="5%">Cantidad</th>
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

                                            {{-- Compra # --}}
                                            <td>{{ $item->purchase_no }}</td>

                                            {{-- Fecha --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('D[/]MMM[/]YYYY') }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>

                                            {{-- Proveedor --}}
                                            <td>{{ $item->supplier->name }}</td>

                                            {{-- Categoría --}}
                                            <td>{{ $item->category->name }}</td>

                                            {{-- Cantidad --}}
                                            <td>{{ $item->buying_qty }}</td>

                                            {{-- Producto Nombre --}}
                                            <td>{{ $item->product->name }}</td>

                                            {{-- Estatus --}}
                                            <td>
                                                @if ($item->status == 1)
                                                    {{-- <span class="badge rounded-pill bg-success">Aprobado</span> --}}
                                                    <span class="btn btn-success">Aprobado</span>
                                                @else
                                                    {{-- <span class="badge rounded-pill bg-warning">Pendiente</span> --}}
                                                    <span class="btn btn-warning">Pendiente</span>
                                                    {{-- <span class="badge bg-warning">Pendiente</span> --}}
                                                @endif
                                            </td>
                                          

                                            {{-- Acciones --}}
                                            <td>

                                                {{-- Solo desplegar el botón de Eliminar si el estatus esta es pendiente --}}
                                                @if ($item->status == 0)
                                                    {{-- Delete --}}
                                                    <a href="{{ route('delete.purchase', $item->id) }}" 
                                                       class="btn btn-danger sm" 
                                                       title="Eliminar"
                                                       id="delete">
                                                       <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @endif

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
