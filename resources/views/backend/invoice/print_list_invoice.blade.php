@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Imprimir <strong>Facturas</strong></h4>

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

                            <h4 class="card-title">Lista de <strong>Facturas</strong></h4>
                            <p class="card-title-desc">Listado de <code>Facturas</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th width="5%">Serie</th>
                                        <th width="15%">Cliente</th>
                                        <th width="10%">Factura #</th>
                                        <th width="10%">Fecha</th>
                                        <th>Descripción</th>
                                        <th width="10%">Total</th>
                                        <th width="5%">Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Cliente --}}
                                            <td>{{ $item->payment->customer->name }}</td>

                                            {{-- Factura --}}
                                            <td>{{ $item->invoice_no }}</td>

                                            {{-- Fecha --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('D[/]MMM[/]YYYY') }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>

                                            {{-- Descripción --}}
                                            <td>{{ mb_strimwidth($item->description, 0, 50, '...') }}</td>

                                            {{-- Total --}}
                                            <td>{{ formatMoneda($item->payment->total_amount) }}</td>

                                            <td>
                                                <a href="{{ route('print.invoice', $item->id) }}" 
                                                    class="btn btn-info sm" 
                                                    title="Imprimir">
                                                    <i class="fa fa-print"></i>
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
