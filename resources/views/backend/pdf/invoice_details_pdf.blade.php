@extends('admin.admin_master')
@section('admin')
    
    <!-- page-content -->
    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reporte Factura del Cliente</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Reporte Factura</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- Compañía y Fecha --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-16"><strong>Factura # {{ $payment->invoice->invoice_no }}</strong></h4>
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo" height="24" /> EsWeb
                                        </h3>
                                    </div>
                                    <hr>

                                    {{-- Billed To and Shipped To --}}
                                    {{-- <div class="row">
                                        <div class="col-6">
                                            <address>
                                                <strong>Billed To:</strong><br>
                                                John Smith<br>
                                                1234 Main<br>
                                                Apt. 4B<br>
                                                Springfield, ST 54321
                                            </address>
                                        </div>
                                        <div class="col-6 text-end">
                                            <address>
                                                <strong>Shipped To:</strong><br>
                                                Kenny Rigdon<br>
                                                1234 Main<br>
                                                Apt. 4B<br>
                                                Springfield, ST 54321
                                            </address>
                                        </div>
                                    </div> --}}

                                    {{-- Compañía y Fecha --}}
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>EsWeb</strong><br>
                                                La Mesa, Tijuana B.C.<br>
                                                soporte@esweb.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>
                                                <strong>Fecha</strong><br>
                                                {{ formatFecha1($payment->invoice->date) }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           

                            {{-- Datos del Cliente --}}
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Datos del Cliente</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Nombre</strong></td>
                                                            <td class="text-center"><strong>Teléfono</strong></td>
                                                            <td class="text-center"><strong>Email</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $payment->customer->name }}</td>
                                                            <td class="text-center">{{ $payment->customer->mobile_no }}</td>
                                                            <td class="text-center">{{ $payment->customer->email }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                          
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                            {{-- Detalles de la Factura --}}
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Detalles de la Factura</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <td class="text-center" width="5%"><strong>#</strong></td>
                                                            <td class="text-center" width="10%"><strong>Categoría</strong></td>
                                                            <td class="text-center"><strong>Nombre Producto</strong></td>
                                                            <td class="text-center"><strong>En Almacén</strong></td>
                                                            <td class="text-center"><strong>Cantidad</strong></td>
                                                            <td class="text-center"><strong>Precio Unitario</strong></td>
                                                            <td class="text-center"><strong>Total</strong></td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        @php
                                                            $total_sum = '0';
                                                            $invoice_details =  App\Models\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
                                                        @endphp

                                                        @foreach ($invoice_details as $key => $details)

                                                            <tr>
                                                                <td class="text-center">{{ $key + 1 }}</td>
                                                                <td class="text-center">{{ $details['category']['name'] }}</td>
                                                                <td class="text-center">{{ $details['product']['name'] }}</td>
                                                                <td class="text-center">{{ $details['product']['quantity'] }}</td>
                                                                <td class="text-center">{{ $details->selling_qty }}</td>
                                                                <td class="text-center">{{ formatMoneda($details->unit_price) }}</td>
                                                                <td class="text-end">{{ formatMoneda($details->selling_price) }}</td>
                                                            </tr>

                                                            @php
                                                                $total_sum += $details->selling_price;
                                                            @endphp

                                                        @endforeach

                                                        {{-- Subtotal --}}
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="thick-line text-end">{{ formatMoneda($total_sum) }}</td>
                                                        </tr>

                                                        {{-- Descuento --}}
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Descuento</strong>
                                                            </td>
                                                            <td class="no-line text-end">{{ formatMoneda($payment->discount_amount) }}</td>
                                                        </tr>

                                                        {{-- Monto Pagado --}}
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Monto Pagado</strong>
                                                            </td>
                                                            <td class="no-line text-end">{{ formatMoneda($payment->paid_amount) }}</td>
                                                        </tr>

                                                        {{-- Monto Deuda --}}
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Monto Deuda</strong>
                                                            </td>
                                                            <td class="no-line text-end">{{ formatMoneda($payment->due_amount) }}</td>
                                                        </tr>

                                                        {{-- Total --}}
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Total</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                <h6 class="m-0">{{ formatMoneda($payment->total_amount) }}</h6>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light ms-2">Descargar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    
@endsection
