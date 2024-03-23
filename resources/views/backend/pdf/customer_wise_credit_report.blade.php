@extends('admin.admin_master')
@section('admin')
    
    <!-- page-content -->
    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reporte Adeudos por <strong>Cliente</strong> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Reporte de <strong>Adeudos</strong></li>
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
                                                
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- Detalles del Reporte --}}
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Detalles</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <td class="text-center" width="5%"><strong>#</strong></td>
                                                            <td class="text-left"><strong>Nombre del Cliente</strong></td>
                                                            <td class="text-center" width="10%"><strong>Factura #</strong></td>
                                                            <td class="text-center" width="15%"><strong>Fecha</strong></td>
                                                            <td class="text-left" width="15%"><strong>Adeudo</strong></td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        @php
                                                            $total_sum = '0';
                                                        @endphp

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
                                                                <td class="text-left">{{ formatMoneda($item->due_amount) }}</td>
                                                            </tr>

                                                            @php
                                                                $total_sum += $item->due_amount;
                                                            @endphp

                                                        @endforeach


                                                        {{-- Gran Total --}}
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Total Adeudos</strong>
                                                            </td>
                                                            <td class="text-left">
                                                                <h6 class="m-0">{{ formatMoneda($total_sum) }}</h6>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            @php
                                                $date = new DateTime('now', new DateTimeZone('America/Tijuana'));
                                            @endphp
                                            <div class="text-left">
                                                <i>Impreso por: {{ Auth::user()->name }}, {{ $date->format('d/m/Y g:i A') }}</i>
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
