@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reporte de <strong>Proveedores y Productos</strong></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- Titulo --}}
                            <div class="row">
                                <div class="col-6" style="text-align: left;">
                                    <h4 class="card-title">Reporte de <code>Proveedores y Productos</code></h4>
                                    {{-- <h4 class="card-title">Reporte de <strong>Proveedores y Productos</strong></h4>
                                    <p class="card-title-desc">Reporte de <code>Proveedores y Productos</code>.</p> --}}
                                </div>    
                                {{-- <div class="col-6" style="text-align: right;">
                                    <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-print"></i> 
                                         Imprimir</a>
                                </div>     --}}
                            </div>

                            {{-- Seleccionar Radio Buttons Reporte de Proveedores o Reporte de Productos --}}
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <strong>Reporte de Proveedores</strong>
                                    <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value">
                                    &nbsp;&nbsp;

                                    <strong>Reporte de Productos</strong>
                                    <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">

                                </div>
                            </div>
                            

                            <div class="show_supplier">
                                <form method="" action="">

                                    <div class="row">

                                        {{-- Seleccionar Proveedor --}}
                                        <div class="col-sm-8">
                                            <label for="">Nombre del Proveedor</label>
                                            <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                                                <option selected="">Seleccionar un Proveedor</option>
                                                @foreach ($suppliers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Botón Buscar --}}
                                        <div class="col-sm-4" style="padding-top: 28px;">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
