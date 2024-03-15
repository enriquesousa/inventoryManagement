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
                $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
            @endphp


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aprobar <strong>Factura #: {{ $invoice->invoice_no }}</h4>
                            <p class="card-title-desc">Fecha: <code>{{ date('d-m-Y', strtotime($invoice->date)) }}</code>
                            </p>

                            {{-- Tabla 1: Datos del Cliente --}}
                            <div class="table-responsive">
                                <table class="table table-dark" width="100%">

                                    <tbody>

                                        <tr>
                                            <td>
                                                <p> Información del <strong>Cliente</strong> </p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <p><strong>Nombre: </strong>{{ $payment->customer->name }}</p>
                                            </td>
                                            <td>
                                                <p><strong>Teléfono: <strong>{{ $payment->customer->mobile_no }}</p>
                                            </td>
                                            <td>
                                                <p><strong>Correo: <strong>{{ $payment->customer->email }}</p>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td></td>
                                            <td colspan="3">
                                                <p> Descripción: <strong> {{ $invoice->description }} </strong> </p>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                            {{-- Tabla 2: Detalles de la Factura --}}
                            <form method="post" action="{{ route('store.approved.invoice', $invoice->id) }}">
                                @csrf
                                
                                <div class="table-responsive">
                                    <table border="1" class="table table-dark" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Categoría</th>
                                                <th class="text-center">Nombre Producto</th>
                                                <th class="text-center" style="background-color: #8B008B">En Almacén</th>
                                                <th class="text-center">Cantidad</th>
                                                <th class="text-center">Precio Unitario</th>
                                                <th class="text-center" style="color: yellow">Total</th>
                                            </tr>
    
                                        </thead>

                                        @php
                                            $total_sum = '0';
                                        @endphp

                                        <tbody>

                                            @foreach ($invoice['invoice_details'] as $key => $details)

                                                <tr>

                                                    <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
                                                    <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
                                                    <input type="hidden" name="selling_qty[{{ $details->id }}]" value="{{ $details->selling_qty }}">

                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">{{ $details['category']['name'] }}</td>
                                                    <td class="text-center">{{ $details['product']['name'] }}</td>

                                                    @if ($details['product']['quantity'] > $details['selling_qty'])
                                                        <td class="text-center">{{ $details['product']['quantity'] }}</td>
                                                    @else
                                                        <td class="text-center" style="background-color: #8B008B">{{ $details['product']['quantity'] }}</td>
                                                    @endif

                                                    <td class="text-center">{{ $details->selling_qty }}</td>
                                                    <td class="text-center">{{ formatMoneda($details->unit_price) }}</td>
                                                    <td class="text-center">{{ formatMoneda($details->selling_price) }}</td>
                                                </tr>

                                                @php
                                                    $total_sum += $details->selling_price;
                                                @endphp

                                            @endforeach

                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-center" style="color: yellow">Sub Total</td>
                                                <td class="text-center">{{ formatMoneda($total_sum) }}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-center" style="color: yellow">Descuento</td>
                                                <td class="text-center"> {{ formatMoneda($payment->discount_amount) }} </td>
                                            </tr>
                                    
                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-center" style="color: yellow">Monto Pagado</td>
                                                <td class="text-center">{{ formatMoneda($payment->paid_amount) }} </td>
                                            </tr>
                                    
                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-center" style="color: yellow">Monto Deuda</td>
                                                <td class="text-center"> {{ formatMoneda($payment->due_amount) }} </td>
                                            </tr>
                                    
                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-center" style="color: yellow">Gran Total</td>
                                                <td class="text-center">{{ formatMoneda($payment->total_amount) }}</td>
                                            </tr>

                                        </tbody>
    
                                    </table>
                                </div>

                                <button type="submit" class="btn btn-info">Aprobar Factura</button>

                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
