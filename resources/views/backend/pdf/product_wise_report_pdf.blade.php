@extends('admin.admin_master')
@section('admin')
    
    <!-- page-content -->
    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reporte por <strong>Producto</strong></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Reporte por <strong>Producto</strong></li>
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

                            {{-- Nombre Proveedor - Fechas del Reporte --}}
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16">Reporte por Producto</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    
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
                                                            <td class="text-center"><strong>Proveedor</strong></td>
                                                            <td class="text-center" width="5%"><strong>Unidades</strong></td>
                                                            <td class="text-center"><strong>Categoría</strong></td>
                                                            <td class="text-center"><strong>Nombre Producto</strong></td>
                                                            <td class="text-center" width="10%"><strong>Cantidad</strong></td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>

                                                            {{-- Proveedor --}}
                                                            <td class="text-center">{{ $product->supplier->name }}</td>

                                                            {{-- Unidades --}}
                                                            <td class="text-center" width="5%">{{ $product->unit->name }}</td>

                                                            {{-- Categoría --}}
                                                            <td class="text-center">{{ $product->category->name }}</td>

                                                            {{-- Nombre Producto --}}
                                                            <td class="text-left">{{ mb_strimwidth($product->name, 0, 50, '...') }}</td>

                                                            {{-- Cantidad (stock) --}}
                                                            <td class="text-center" width="10%">{{ $product->quantity }}</td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            @php
                                                $date = new DateTime('now', new DateTimeZone('America/Tijuana'));
                                            @endphp

                                            <div class="text-left">
                                                <i>Impreso por: {{ Auth::user()->name }}, {{ $date->format('d/m/Y g:i A') }}</i>
                                                {{-- <p class="text-muted italic" style=""><strong>Fecha de Impresión: </strong> {{ $date->format('d/m/Y g:i A') }}</p> --}}
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
