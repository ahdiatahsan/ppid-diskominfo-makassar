@extends('layouts.master')

@section('title', 'Dashboard')

@section('subheader-main')

<h3 class="kt-subheader__title">
    Dashboard
</h3>

@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fa fa-file-contract"></i></span>
                    <a href="" class="text-dark">
                        <h3 class="kt-portlet__head-title">Data Berkala</h3>
                    </a>
                </div>
            </div>
            <div>
                <div class="kt-widget1">
                    <div class="kt-widget1__item justify-content-center">
                        <span class="kt-widget1__number kt-font-info">{{ $berkala }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fa fa-file-pdf"></i></span>
                    <a href="" class="text-dark">
                        <h3 class="kt-portlet__head-title">Data Setiap Saat</h3>
                    </a>
                </div>
            </div>
            <div>
                <div class="kt-widget1">
                    <div class="kt-widget1__item justify-content-center">
                        <span class="kt-widget1__number kt-font-info">{{ $setiapsaat }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fa fa-file-excel"></i></span>
                    <a href="" class="text-dark">
                        <h3 class="kt-portlet__head-title">Data Serta Merta</h3>
                    </a>
                </div>
            </div>
            <div>
                <div class="kt-widget1">
                    <div class="kt-widget1__item justify-content-center">
                        <span class="kt-widget1__number kt-font-info">{{ $sertamerta }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fa fa-file-image"></i></span>
                    <a href="" class="text-dark">
                        <h3 class="kt-portlet__head-title">Data Infografis</h3>
                    </a>
                </div>
            </div>
            <div>
                <div class="kt-widget1">
                    <div class="kt-widget1__item justify-content-center">
                        <span class="kt-widget1__number kt-font-info">{{ $infografis }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
