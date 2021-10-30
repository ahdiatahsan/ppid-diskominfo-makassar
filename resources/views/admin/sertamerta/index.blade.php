@extends('layouts.master')

@section('title', 'Data Serta Merta')

@section('vendor-css')
<link href="{{ asset("metronic/assets/plugins/custom/datatables/datatables.bundle.css") }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('subheader-main')

<h3 class="kt-subheader__title">
    Administrasi
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Tabel Data Serta Merta </span>
</div>

@endsection

@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-calendar-check"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Tabel Data Serta Merta
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="{{ route('sertamerta.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="table-responsive">
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline"
                role="grid" aria-describedby="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Ringkasan Informasi</th>
                        <th>Sumber</th>
                        <th>No. Telepon</th>
                        <th>Kategori</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end: Datatable -->
    </div>
</div>

@endsection

@section('vendor-js')
<script src="{{ asset("metronic/assets/plugins/custom/datatables/datatables.bundle.js") }}" type="text/javascript">
</script>
@endsection

@section('js')

<script src="{{ asset('plugins/datatables/datatables.bundle.js') }}"></script>
<script>
    $(document).ready(function () {

    $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sertamerta.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'ringkasan', name: 'ringkasan'},
                {data: 'sumber', name: 'sumber'},
                {data: 'telp', name: 'telp'},
                {data: 'kategori', name: 'kategori'},
                {data: 'link', name: 'link'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0,6],
                },
            ],
            pagingType: "full_numbers"
    });
});
</script>

@endsection
