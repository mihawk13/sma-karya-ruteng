@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="{{ asset('assets/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Potongan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Potongan</a></li>
        <li class="active"><span>Tambah</span></li>
    </ol>
</div>
@endsection
@section('content')

<!-- alert -->
<x-messages />

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <form data-toggle="validator" role="form" action="{{ route('potongan.tambah') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Potongan</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Nama Pegawai</label>
                                <select name="pgw" class="form-control select2" required>
                                    <option value="">--Pilih Pegawai--</option>
                                    @foreach ($pegawai as $pgw)
                                        <option value="{{ $pgw->id }}">{{ $pgw->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Simpan Pinjam</label>
                                <input type="number" class="form-control" name="simpan_pinjam" placeholder="Masukkan Potongan Simpan Pinjam"
                                    required value="{{ old('simpan_pinjam') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Konsumsi Wajib</label>
                                <input type="number" class="form-control" name="konsumsi_wajib" placeholder="Masukkan Potongan Konsumsi Wajib"
                                    required value="{{ old('konsumsi_wajib') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Uang Duka</label>
                                <input type="number" class="form-control" name="uang_duka" placeholder="Masukkan Potongan Uang Duka"
                                    required value="{{ old('uang_duka') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('potongan') }}" type="button" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
@endsection

@section('script')
<script src="{{ asset('assets/vendors/bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
    /*Form advanced Init*/
    $(document).ready(function() {
        "use strict";

        /* Select2 Init*/
        $(".select2").select2();
    });
</script>
@endsection
