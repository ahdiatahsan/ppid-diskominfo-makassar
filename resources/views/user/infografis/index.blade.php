@extends('layouts.public')

@section('title', 'Infografis')

@section('vendor-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

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
            <h1 class="text-center">Informasi Publik Serta Merta Infografis</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="page-section">
    <div class="lightbox-gallery">
        <div class="container">
            <div class="row photos">
                @foreach ($infografises as $infografis)
                <div class="col-md-4 col-lg-4 item">
                    <a href="{{ Storage::url('public/infografis/' . $infografis->gambar) }}"
                        data-lightbox="photos"><img class="img-fluid" src="{{ Storage::url('public/infografis/' . $infografis->gambar) }}" alt="{{ $infografis->judul }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> <!-- .page-section -->
<br><br>
@endsection

@section('vendor-js')
<script src="{{ asset('users/js/theme.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
@endsection
