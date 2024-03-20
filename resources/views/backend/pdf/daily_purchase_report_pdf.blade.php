@extends('admin.admin_master')
@section('admin')
    
    <!-- page-content -->
    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reporte de Compras PDF por <strong>Rango de Fechas</strong></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Reporte de <strong>Compras</strong></li>
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

                            

                            {{-- Fechas del Reporte --}}
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16">Reporte de <strong>Compras</strong></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <strong>Rango de Fechas: </strong>
                                    <span class="btn btn-info">{{ date('d-m-Y', strtotime($start_date)) }}</span> - 
                                    <span class="btn btn-info">{{ date('d-m-Y', strtotime($end_date)) }}</span>
                                </div>
                            </div>

                            {{-- Detalles del Reporte --}}
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <td class="text-center" width="5%"><strong>NS</strong></td>
                                                            <td class="text-center" width="5%"><strong>Compra #</strong></td>
                                                            <td class="text-center" width="15%"><strong>Fecha</strong></td>
                                                            <td class="text-center"><strong>Producto</strong></td>
                                                            <td class="text-center" width="10%"><strong>Cantidad</strong></td>
                                                            <td class="text-center" width="10%"><strong>Precio Unitario</strong></td>
                                                            <td class="text-center" width="10%"><strong>Total</strong></td>
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

                                                                {{-- N° de Compra --}}
                                                                <td class="text-center">{{ $item->purchase_no }}</td>

                                                                {{-- Fecha de Compra --}}
                                                                <td class="text-center">{{ date('d-m-Y', strtotime($item->date)) }}</td>

                                                                {{-- Nombre del Producto --}}
                                                                <td class="text-left">{{ mb_strimwidth($item->product->name, 0, 50, '...') }}</td>

                                                                {{-- Cantidad --}}
                                                                <td class="text-center">{{ $item->buying_qty }} {{ $item->product->unit->name }}</td>

                                                                {{-- Precio Unitario --}}
                                                                <td class="text-center">{{ formatMoneda($item->unit_price) }}</td>

                                                                {{-- Total --}}
                                                                <td class="text-center">{{ formatMoneda($item->buying_price) }}</td>
                                                             
                                                            </tr>

                                                            @php
                                                                $total_sum += $item->buying_price;
                                                            @endphp

                                                        @endforeach


                                                        {{-- Gran Total --}}
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
                                                                <h6 class="m-0">{{ formatMoneda($total_sum) }}</h6>
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
