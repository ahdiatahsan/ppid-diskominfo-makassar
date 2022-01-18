@extends('layouts.public')

@section('title', 'Tentang')

@section('banner')
<div class="page-banner">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-md-6">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
          <li class="breadcrumb-item"><a href="">Beranda</a></li>
          <li class="breadcrumb-item active">Tentang</li>
        </ul>
      </nav>
      <h1 class="text-center">Tentang Kami</h1>
    </div>
  </div>
</div>
@endsection
      
@section('content')
<div class="page-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 py-3">
        <h2 class="title-section">Dinas Komunikasi Dan Informatika Kota Makassar</h2>
        <div class="divider"></div>

        <p>Dinas Komunikasi dan Informatika merupakan unsur pelaksana urusan pemerintahan bidang komunikasi dan informatika, urusan pemerintahan bidang persandian, dan urusan pemerintahan bidang statistik yang dipimpin oleh Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.</p>
        
      </div>
      <div class="col-lg-6 py-3">
        <div class="img-fluid py-3 text-center">
          <img src="{{ asset('users/img/about_frame.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
  
@section('vendor-js')
<script src="{{ asset('users/js/theme.js') }}"></script>
@endsection