@extends('layouts.master')

@section('title', 'Data Berkala')

@section('subheader-main')

<h3 class="kt-subheader__title">
    Administrasi
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Tambah Data Berkala </span>
</div>

@endsection

@section('content')

<form action="{{ route('berkala.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Tambah Data Berkala
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('berkala.index') }}" class="btn btn-clean">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Kembali</span>
                        </a>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>Ringkasan Informasi<span class="text-danger">*</span></label>
                        <input class="form-control @error('ringkasan') is-invalid @enderror" type="text"
                            name="ringkasan" id="ringkasan" value="{{ old('ringkasan') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Pejabat / Unit /Satker<span class="text-danger">*</span></label>
                        <input class="form-control @error('unit') is-invalid @enderror" type="text" name="unit"
                            id="unit" value="{{ old('unit') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Penanggung Jawab<span class="text-danger">*</span></label>
                        <input class="form-control @error('penanggungjawab') is-invalid @enderror" type="text"
                            name="penanggungjawab" id="penanggungjawab" value="{{ old('penanggungjawab') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jangka<span class="text-danger">*</span></label>
                        <input class="form-control @error('jangka') is-invalid @enderror" type="text" name="jangka"
                            id="jangka" value="{{ old('jangka') }}" required>
                    </div>

                    <div class="form-group form-group-last">
                        <label>File Unduhan</label><span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('unduhan') is-invalid @enderror" name="unduhan"
                            id="unduhan" required>
                        <small class="text-danger">Format file yang diterima adalah pdf, docx, doc, xlsx, xls, pptx, ppt
                            dengan ukuran maksimal 2 MB.</small>
                    </div>
                </div>

                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-12 kt-align-center">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
