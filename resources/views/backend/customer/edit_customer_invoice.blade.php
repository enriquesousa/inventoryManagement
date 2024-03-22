@extends('admin.admin_master')
@section('admin')

    {{-- Jquery CDN Para poder usar JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- page-content -->
    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Factura del <strong>Cliente</strong></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Factura</li>
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

                            <a href="{{ route('credit.customer') }}" class="btn btn-success waves-effect waves-light" style="float:right;"><i class="dripicons-return"></i> Regresar</a>

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

                                    <form method="post" action="{{ route('customer.update.invoice', $payment->invoice_id) }}" id="myForm">
                                        @csrf

                                        <div>
                                            <div class="p-2">
                                                <h5 class="float-end font-size-16"><strong>Factura # {{ $payment->invoice->invoice_no }} </strong></h5>
                                                <h3 class="font-size-16"><strong>Detalles de la Factura</strong></h3>
                                            </div>

                                            {{-- Tabla Detalles de la Factura --}}
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
                                                            $invoice_details = App\Models\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
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
                                                            <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
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

                                            {{-- Opciones de Abonar o Pagar, Botón Actualizar Factura --}}
                                            <div class="row">

                                                <div class="form-group col-md-3">
                                                    <label>Estatus de Pago</label>
                                                    <select name="paid_status" id="paid_status" class="form-select">
                                                        <option value="">Seleccionar Estatus</option>
                                                        <option value="full_paid">Pagar Todo</option>
                                                        <option value="partial_paid">Pago Parcial</option>

                                                    </select>
                                                    <input type="text" name="paid_amount" class="form-control paid_amount"
                                                        placeholder="Entre el Monto" style="display:none;">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <div class="md-3">
                                                        <label for="example-text-input" class="form-label">Fecha</label>
                                                        <input class="form-control example-date-input" name="date" type="date"
                                                            id="date" value="{{ $date }}" placeholder="YYYY-MM-DD">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <div class="md-3" style="padding-top: 30px">
                                                        <button type="submit" class="btn btn-info">Actualizar Factura</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div> 

                            

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    {{-- JS para el manejo de estado de pago, pago parcial --}}
    <script type="text/javascript">

        $(document).on('change','#paid_status', function(){
            var paid_status = $(this).val();
            if (paid_status == 'partial_paid') {
                $('.paid_amount').show();
            }else{
                $('.paid_amount').hide();
            }
        });

    </script>

     {{-- JS para el manejo de validaciones --}}
     <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    paid_status: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },
                   
                },
                messages: {
                    paid_status: {
                        required: 'El estatus de pago es requerido',
                    },
                    date: {
                        required: 'La fecha es requerida',
                    },
                    
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    
@endsection
