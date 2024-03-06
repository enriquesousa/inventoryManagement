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
                        <h4 class="mb-sm-0">Agregar <strong>Compra</strong></h4>
                        <div class="page-title-right">

                            <a href="{{ route('list.purchase') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="dripicons-return"></i> Regresar a Lista de Compras</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Agregar <strong>Compra</strong></h4>
                            <p class="card-title-desc">Llene el <code>formulario</code> para agregar una nueva compra.</p>

                            <div class="row">

                                {{-- Fecha --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Fecha</label>
                                         <input class="form-control example-date-input" name="date" type="date"  id="date">
                                    </div>
                                </div>

                                {{-- Purchase No --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Compra #</label>
                                         <input class="form-control example-date-input" name="purchase_no" type="text"  id="purchase_no">
                                    </div>
                                </div>

                                {{-- Supplier Name --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Proveedor</label>

                                        <select id="supplier_id" name="supplier_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Seleccionar un Proveedor</option>
                                            @foreach($suppliers as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2">

                                {{-- Category Name --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Categoría</label>

                                        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Seleccionar una Categoría</option>
                        
                                        </select>
                                    </div>
                                </div>

                                {{-- Product Name --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Producto</label>

                                        <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Seleccionar un producto</option>
                        
                                        </select>
                                    </div>
                                </div>

                                {{-- Add More --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>
                                        <input type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Agregar mas">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#supplier_id',function(){
                var supplier_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-category') }}", //la ruta nos regresa datos de la tabla products
                    type: "GET",
                    data:{supplier_id:supplier_id},
                    success:function(data){
                        var html = '<option value="">Seleccionar Categoría</option>';
                        $.each(data,function(key,v){
                            html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
                        });
                        $('#category_id').html(html);
                    }
                })
            });
        });
    </script>

@endsection
