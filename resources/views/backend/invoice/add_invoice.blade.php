@extends('admin.admin_master')
@section('admin')
    {{-- Jquery CDN Para poder usar JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Agregar <strong>Factura</strong></h4>
                        <div class="page-title-right">

                            <a href="{{ route('list.purchase') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="dripicons-return"></i> Regresar a Lista de Facturas</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        {{-- Datos de la Factura --}}
                        <div class="card-body">

                            <h4 class="card-title">Agregar <strong>Factura</strong></h4>
                            <p class="card-title-desc">Llene el <code>formulario</code> para agregar una nueva factura.</p>


                            <div class="row">

                                {{-- Factura No --}}
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Factura #</label>
                                        <input class="form-control example-date-input" name="invoice_no" type="text"
                                            value="{{ $invoice_no }}" id="invoice_no" readonly style="background-color: lightgray">
                                    </div>
                                </div>

                                {{-- Fecha --}}
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Fecha</label>
                                        <input class="form-control example-date-input" name="date" type="date"
                                            id="date" value="{{ $date }}">
                                    </div>
                                </div>

                                {{-- Category Name --}}
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Categoría</label>

                                        <select name="category_id" id="category_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Seleccionar una Categoría</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Product Name --}}
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Producto</label>

                                        <select name="product_id" id="product_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Seleccionar un producto</option>

                                        </select>
                                    </div>
                                </div>

                                {{-- Stock --}}
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Almacén (Piezas/KG)</label>
                                        <input class="form-control example-date-input" name="current_stock_qty"
                                            type="text" id="current_stock_qty" readonly
                                            style="background-color: lightgray">
                                    </div>
                                </div>


                                {{-- Add More --}}
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top:43px;">
                                        </label>
                                        <i
                                            class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                            Agregar</i>
                                    </div>
                                </div>


                            </div>

                        </div>

                        {{-- Tabla de Detalles de la Factura --}}
                        <div class="card-body">

                            <form method="post" action="{{ route('store.purchase') }}">
                                @csrf

                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                                    <thead>
                                        <tr>
                                            <th width="15%">Categoría</th>
                                            <th>Nombre Producto</th>
                                            <th width="7%">Piezas/KG</th>
                                            <th width="10%">Precio Unitario</th>
                                            <th width="15%">Precio Total</th>
                                            <th width="7%">Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody id="addRow" class="addRow">

                                    </tbody>

                                    {{-- Total de las Compras - estimated_amount --}}
                                    <tbody>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-end"><h6><strong>Gran Total:</strong></h6></td>
                                            <td>
                                                <input type="text" name="estimated_amount" value="0"
                                                    id="estimated_amount" class="form-control estimated_amount" readonly
                                                    style="background-color: #ddd;">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Escriba una Descripción al Detalle de la Factura"></textarea>
                                    </div>
                                </div>


                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton"><i class="ri-save-line"></i> Guardar Factura</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Preparar el Handlebars Template para la tabla que sera desplegada en: <tbody id="addRow" class="addRow"> --}}
    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">

            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
        
            <td>
                <input type="hidden" name="category_id[]" value="@{{category_id}}">
                @{{ category_name }}
            </td>
        
            <td>
                <input type="hidden" name="product_id[]" value="@{{product_id}}">
                @{{ product_name }}
            </td>
        
            <td>
                <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value=""> 
            </td>
        
            <td>
                <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
            </td>
        
            <td>
                <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly> 
            </td>
        
            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
            </td>
        
        </tr>
        
    </script>

    {{-- JS para desplegar datos en tabla y desplegar el template de handlebars --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on("click", ".addeventmore", function() {

                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();


                if (date == '') {
                    $.notify("La Fecha es Requerida", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }


                if (category_id == '') {
                    $.notify("La Categoría es Requerida", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (product_id == '') {
                    $.notify("El Producto es Requerido", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);

                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };
                var html = template(data);
                $("#addRow").append(html);
            });

            $(document).on("click", ".removeeventmore", function() {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price,.selling_qty', function() {
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.selling_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.selling_price").val(total);
                totalAmountPrice();
            });

            // Calculate sum of Amount in Invoice 
            function totalAmountPrice() {
                var sum = 0;
                $(".selling_price").each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });

                $('#estimated_amount').val(formatCurrency(sum));
            };

            // Para convertir numero en moneda
            const formatCurrency = (number, symbol = '$') => {
                // Add thousands separator
                const formattedNumber = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                // Format the number as a currency string
                return `${symbol} ${formattedNumber}`;
            };

        });
    </script>

    {{-- JS para el manejo de categorías --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#supplier_id', function() {
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-category') }}", //la ruta nos regresa datos de la tabla products
                    type: "GET",
                    data: {
                        supplier_id: supplier_id
                    },
                    success: function(data) {
                        var html = '<option value="">Seleccionar Categoría</option>';
                        $.each(data, function(key, v) {
                            html += '<option value=" ' + v.category_id + ' "> ' + v
                                .category.name + '</option>';
                        });
                        $('#category_id').html(html);
                    }
                })
            });
        });
    </script>

    {{-- JS para el manejo de productos --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product-category') }}", //la ruta nos regresa datos de la tabla products
                    type: "GET",
                    data: {
                        category_id: category_id,
                    },
                    success: function(data) {
                        var html = '<option value="">Seleccionar Producto</option>';
                        $.each(data, function(key, v) {
                            html += '<option value=" ' + v.id + ' "> ' + v.name +
                                '</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
            });
        });
    </script>

    {{-- JS para el manejo desplegar stock de productos --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('check-product-stock') }}", //la ruta nos regresa datos de la tabla products
                    type: "GET",
                    data: {
                        product_id: product_id,
                    },
                    success: function(data) {
                        $('#current_stock_qty').val(data);
                    }
                })
            });
        });
    </script>

@endsection
