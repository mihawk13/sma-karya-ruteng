@extends('layouts.app')

@section('css')
{{-- <!-- Morris Charts CSS -->
<link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}

<style>
    .text-biasa {
        text-decoration: none;
        color: inherit;
    }

    .jarak-atas {
        margin-top: 40px;
    }
</style>
@endsection

{{-- @section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Dashboard</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
    </ol>
</div>
@endsection --}}

@section('content')
<div class="row mb-5">
    <h3 class="text-center mb-5">Selamat Datang di Sistem Informasi Penggajian SMA Karya Ruteng</h3>
    <center><img class="rounded mx-auto d-block" src="{{ asset('assets\dist\img\tutwuri.png') }}" height="250"
            width="250" alt=""></center>
</div>

<div class="row jarak-atas">
    <a href="{{ route('pegawai') }}">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter">{{ getJmlPegawai() }}</span>
                                        <span class="weight-500 uppercase-font block">Pegawai</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="fa fa-users data-right-rep-icon txt-light-grey"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('user') }}">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter">{{ getJmlUser() }}</span>
                                        <span class="weight-500 uppercase-font block">Users</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="fa fa-user data-right-rep-icon txt-light-grey"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('absensi') }}">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter">{{ getJmlAbsensi() }}</span>
                                        <span class="weight-500 uppercase-font block">Absensi</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                        <i class="fa fa-american-sign-language-interpreting data-right-rep-icon txt-light-grey"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('tunjangan') }}">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter">{{ getJmlTunjangan() }}</span>
                                        <span class="weight-500 uppercase-font block">Tunjangan</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                        <div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;">
                                            <i class="fa fa-money data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

@endsection
