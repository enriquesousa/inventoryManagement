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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aprobar <strong>Factura</strong></h4>
                            <p class="card-title-desc">Aprobar <code>Factura</code>.</p>

                         

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
