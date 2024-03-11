@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Facturas</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.purchase') }}" class="btn btn-success waves-effect waves-light"><i
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

                            <h4 class="card-title">Lista de <strong>Facturas</strong></h4>
                            <p class="card-title-desc">Listado de <code>Facturas</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Cliente</th>
                                        <th>Factura #</th>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Cliente --}}
                                            <td> </td>

                                            {{-- Factura --}}
                                            <td>{{ $item->invoice_no }}</td>

                                            {{-- Fecha --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('D[/]MMM[/]YYYY') }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>

                                            {{-- Descripción --}}
                                            <td>{{ $item->description }}</td>

                                            

                                            {{-- Acciones --}}
                                            <td>
                                            
                                                {{-- Delete --}}
                                                <a href="{{ route('delete.purchase', $item->id) }}" 
                                                    class="btn btn-danger sm" 
                                                    title="Eliminar"
                                                    id="delete">
                                                    <i class="fas fa-trash-alt"></i>
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
