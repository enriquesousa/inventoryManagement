@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lista de <strong>Unidades</strong></h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.supplier') }}" class="btn btn-success waves-effect waves-light"><i
                                    class="fas fa-plus-circle"></i> Agregar Unidad</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Lista de <strong>Unidades</strong></h4>
                            <p class="card-title-desc">Listado de <code>Unidades</code> solo nombre.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Unidad</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($units as $key => $item)
                                        <tr>

                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Unidad --}}
                                            <td>{{ $item->name }}</td>
                                    

                                            {{-- Acciones --}}
                                            <td>
                                                {{-- Edit --}}
                                                <a href="{{ route('edit.supplier', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"><i class="fas fa-edit"></i></a>

                                                {{-- Details --}}
                                                {{-- <a href="{{ route('show.supplier', $item->id) }}" class="btn btn-success sm"
                                                    title="Details Data"><i class="fas fa-eye"></i></a> --}}

                                                {{-- Delete --}}
                                                <a href="{{ route('delete.supplier', $item->id) }}" class="btn btn-danger sm" title="Delete Data"
                                                    id="delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>

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
