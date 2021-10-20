@extends('layouts.master')

@section('title', 'Data Serta Merta')

@section('subheader-main')

<h3 class="kt-subheader__title">
    Administrasi
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Ubah Data Serta Merta </span>
</div>

@endsection

@section('content')

<form action="{{ route('sertamerta.update', $sertamerta->id) }}" method="POST" enctype="multipart/form-data"
    autocomplete="off">
    @csrf
    @method('PATCH')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Ubah Data Serta Merta
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('sertamerta.index') }}" class="btn btn-clean">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Kembali</span>
                        </a>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>Ringkasan Informasi<span class="text-danger">*</span></label>
                        <input class="form-control @error('ringkasan') is-invalid @enderror" type="text"
                            name="ringkasan" id="ringkasan" value="{{ $sertamerta->ringkasan }}" required>
                    </div>

                    <div class="form-group">
                        <label>Sumber<span class="text-danger">*</span></label>
                        <input class="form-control @error('sumber') is-invalid @enderror" type="text" name="sumber"
                            id="sumber" value="{{ $sertamerta->sumber }}" required>
                    </div>

                    <div class="form-group">
                        <label>No. Telepon<span class="text-danger">*</span></label>
                        <input class="form-control @error('telp') is-invalid @enderror" type="number" name="telp"
                            id="telp" value="{{ $sertamerta->telp }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label><span class="text-danger">*</span></label>
                        <select class="form-control @error('kategori') is-invalid @enderror" id="jenis_surat"
                            name="kategori" required>
                            <option value="Umum" {{ ($sertamerta->kategori == 'Umum') ? 'selected' : '' }}>
                                Umum</option>
                            <option value="Bencana Alam"
                                {{ ($sertamerta->kategori == 'Bencana Alam') ? 'selected' : '' }}>
                                Bencana Alam</option>
                            <option value="Cuaca" {{ ($sertamerta->kategori == 'Cuaca') ? 'selected' : '' }}>
                                Cuaca</option>
                            <option value="Telepon" {{ ($sertamerta->kategori == 'Telepon') ? 'selected' : '' }}>
                                No. Telepon</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                            id="sumber" value="{{ $sertamerta->link }}" required>
                    </div>

                    <div class="form-group form-group-last">
                        <label>File Unduhan Baru</label>
                        <input type="text" class="form-control" name="unduhan_lama" id="unduhan_lama"
                            value="{{ $sertamerta->unduhan }}" readonly hidden>
                        <input type="file" class="form-control @error('unduhan') is-invalid @enderror" name="unduhan"
                            id="unduhan">
                        <small class="text-danger">Format file yang diterima adalah pdf, docx, doc, xlsx, xls, pptx, ppt
                            dengan ukuran maksimal 2 MB.</small>
                    </div>
                </div>

                <div class=" kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-12 kt-align-center">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                                Ubah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
