@extends('layouts.public')

@section('title', 'Beranda')

@section('banner')
<div class="page-banner home-banner">
    <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4"><b>PPID Diskominfo Kota Makassar</b></h1>
            <p class="text-lg text-grey mb-5">Pejabat Pengelola Informasi dan Dokumentasi Pembantu (PPID Pembantu)
                adalah pejabat yang melaksanakan tugas dan fungsi sebagai PPID pada Dinas Komunikasi dan Informatika di
                lingkungan Pemerintah Kota Makassar. </p>
        </div>
        <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
                <img src="{{ asset('users/img/banner_image_1.svg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a> -->
</div>
</div>
@endsection

@section('content')
<div class="page-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="card-service">
                  <div class="header">
                      <a href=""><img src="{{ asset('users/img/services/information.png')}}" alt=""></a>
                  </div>
                  <div class="body">
                      <h5 class="text-secondary">Informasi Publik Secara Berkala</h5>
                      <p>Merupakan informasi yang wajib disediakan dan diumumkan secara berkala.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="card-service">
                  <div class="header">
                      <a href=""><img src="{{ asset('users/img/services/real-time.png')}}" alt=""></a>
                  </div>
                  <div class="body">
                      <h5 class="text-secondary">Informasi Publik Setiap Saat</h5>
                      <p>Informasi yang wajib disediakan oleh Badan Publik</p><br>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="card-service">
                  <div class="header">
                      <a href=""><img src="{{ asset('users/img/services/informasi.png') }}" alt=""></a>
                  </div>
                  <div class="body">
                      <h5 class="text-secondary">Serta Merta Informasi</h5>
                      <p>Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="card-service">
                  <div class="header">
                      <a href=""><img src="{{ asset('users/img/services/geografis.png') }}"
                              alt=""></a>
                  </div>
                  <div class="body">
                      <h5 class="text-secondary">Serta Merta Infografis</h5>
                      <p>Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum</p>
                  </div>
              </div>
          </div>
      </div>
  </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection