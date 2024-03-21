@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Estado de Crédito del <strong>Cliente</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('credit.customer.print.pdf') }}" target="_blank" class="btn btn-success waves-effect waves-light"><i
                                    class="fa fa-print"></i> Imprimir Reporte</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Estado de Crédito del <strong>Cliente</strong></h4>
                            <p class="card-title-desc">Listado de <code>Créditos</code> de clientes.</p>

                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">Serie</th>
                                        <th class="text-left">Cliente</th>
                                        <th class="text-center" width="5%">Factura #</th>
                                        <th class="text-center" width="15%">Fecha</th>
                                        <th class="text-left" width="10%">Debe</th>
                                        <th class="text-left" width="15%">Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td class="text-center">{{ $key + 1 }}</td>

                                            {{-- Cliente --}}
                                            <td>{{ $item->customer->name }}</td>

                                            {{-- Factura --}}
                                            <td class="text-center">{{ $item->invoice->invoice_no }}</td>

                                            {{-- Fecha --}}
                                            <td class="text-center">{{ date('d-m-Y', strtotime($item->invoice->date)) }}</td>

                                            {{-- Total --}}
                                            <td>{{ formatMoneda($item->due_amount) }}</td>
                                           

                                            {{-- Acciones --}}
                                            <td>

                                                {{-- Edit --}}
                                                <a href="{{ route('edit.customer.invoice', $item->invoice_id) }}" 
                                                    class="btn btn-info sm"  
                                                    title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- Details --}}
                                                <a href="{{ route('show.customer', $item->id) }}" class="btn btn-success sm"
                                                    title="Detalle"><i class="fas fa-eye"></i></a>
                                           
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
