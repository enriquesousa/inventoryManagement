@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista Entradas de <strong>Clientes</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('paid.customer.print.pdf') }}"
                                target="_blank" 
                                class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-print"></i> 
                                Imprimir Reporte
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista Entradas de <strong>Clientes</strong></h4>
                            <p class="card-title-desc">Listado de Entradas de <code>Clientes</code>.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Cliente</th>
                                        <th>Factura</th>
                                        <th>Fecha</th>
                                        <th>Adeudo</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Cliente --}}
                                            <td>{{ $item->customer->name }}</td>

                                            {{-- Factura --}}
                                            <td>{{ $item->invoice->invoice_no }}</td>

                                            {{-- Fecha --}}
                                            <td>{{ date('d-m-Y', strtotime($item->invoice->date)) }}</td>

                                            {{-- Adeudo --}}
                                            <td>{{ formatMoneda($item->due_amount) }}</td>
                                            

                                            {{-- Acciones --}}
                                            <td>
                                               
                                                {{-- Details --}}
                                                <a href="{{ route('customer.invoice.details.pdf', $item->invoice_id) }}" 
                                                    class="btn btn-success sm"
                                                    title="Detalle"
                                                    target="_blank">
                                                    <i class="fas fa-eye"></i>
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
