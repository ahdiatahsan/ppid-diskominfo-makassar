@extends('layouts.public')

@section('title', 'Berkala')

@section('vendor-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link href="{{ asset("metronic/assets/plugins/custom/datatables/datatables.bundle.css") }}" rel="stylesheet"
    type="text/css" />

<style>
    th {
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection


@section('banner')
<div class="page-banner">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="">Beranda</a></li>
                    <li class="breadcrumb-item active">Informasi Publik</li>
                </ul>
            </nav>
            <h1 class="text-center">Informasi Publik Secara Berkala</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Berikut Daftar Informasi Publik Secara Berkala : </h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline"
            role="grid" aria-describedby="table">
                <thead>
                    <tr align="center" style="background-color: #f6f5fc;">
                        <th>No</th>
                        <th>Ringkasan Isi Informasi</th>
                        <th>Pejabat/Unit/Satker yang menguasai informasi</th>
                        <th>Penanggung Jawab</th>
                        <th>Jangka Waktu Penyimpanan</th>
                        <th>File/Unduhan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<br><br>
@endsection

@section('vendor-js')
<script src="{{ asset('users/js/theme.js') }}"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script src="{{ asset('plugins/datatables/datatables.bundle.js') }}"></script>
<script>
    $(document).ready(function () {

    $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            "bInfo": false,
            ajax: "{{ route('berkalapublic.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'ringkasan', name: 'ringkasan'},
                {data: 'unit', name: 'unit'},
                {data: 'penanggungjawab', name: 'penanggungjawab'},
                {data: 'jangka', name: 'jangka'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0,5],
                },
            ],
            pagingType: "numbers"
    });
});
</script>
@endsection
