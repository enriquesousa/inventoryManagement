@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Aprobar <strong>Factura</strong></h4>

                        <div class="page-title-right">

                            <a href="{{ route('pending.list.invoice') }}" class="btn btn-success waves-effect waves-light">
                                <i class="fa fa-list"></i> Lista Aprobar Facturas</a>

                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            {{-- Buscar datos en Modelo en blade --}}
            @php
                $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
            @endphp    


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aprobar <strong>Factura #: {{ $invoice->invoice_no }}</h4>
                            <p class="card-title-desc">Fecha: <code>{{ date('d-m-Y', strtotime($invoice->date)) }}</code></p>

                            <div class="table-responsive">
                                <table class="table table-dark" width="100%">

                                    <tbody>

                                        <tr>
                                            <td><p> Información del <strong>Cliente</strong> </p></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><p><strong>Nombre: </strong>{{ $payment->customer->name }}</p></td>
                                            <td><p><strong>Teléfono: <strong>{{ $payment->customer->mobile_no }}</p></td>
                                            <td><p><strong>Correo: <strong>{{ $payment->customer->email }}</p></td>
                                        </tr>
                                        
                            
                                        <tr>
                                            <td></td>
                                            <td colspan="3"><p> Descripción: <strong> {{ $invoice->description  }} </strong> </p></td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                         

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
