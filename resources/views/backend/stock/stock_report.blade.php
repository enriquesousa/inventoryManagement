@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Inventario</strong></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6" style="text-align: left;">
                                    <h4 class="card-title">Lista de <strong>Inventario</strong></h4>
                                    <p class="card-title-desc">Lista de <code>Inventario</code>.</p>
                                </div>    
                                <div class="col-6" style="text-align: right;">
                                    <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-print"></i> 
                                         Imprimir</a>
                                </div>    
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th width="5%">Serie</th>
                                        <th>Proveedor</th>
                                        <th width="5%">Unidades</th>
                                        <th>Categoría</th>
                                        <th>Nombre Producto</th>
                                        <th width="5%">Cantidad Comprada</th>
                                        <th width="5%">Cantidad Vendida</th>
                                        <th width="5%">En Almacén</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)


                                        @php
                                            $cantidadComprada = App\Models\Purchase::where('category_id', $item->category_id)
                                                ->where('product_id', $item->id)
                                                ->where('status', '1')
                                                ->sum('buying_qty');

                                            $cantidadVendida = App\Models\InvoiceDetail::where('category_id', $item->category_id)
                                                ->where('product_id', $item->id)
                                                ->where('status', '1')
                                                ->sum('selling_qty');
                                        @endphp

                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Proveedor --}}
                                            <td>{{ $item->supplier->name }}</td>

                                            {{-- Unidades --}}
                                            <td>{{ $item->unit->name }}</td>

                                            {{-- Categoría --}}
                                            <td>{{ $item->category->name }}</td>

                                            {{-- Nombre Producto --}}
                                            <td>{{ mb_strimwidth($item->name, 0, 50, '...') }}</td>

                                            {{-- Cantidad Comprada --}}
                                            <td class="text-center">{{ $cantidadComprada }}</td>

                                            {{-- Cantidad Vendida --}}
                                            <td class="text-center">{{ $cantidadVendida }}</td>

                                            {{-- Cantidad (stock) --}}
                                            <td class="text-center">{{ $item->quantity }}</td>

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
