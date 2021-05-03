@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Potongan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Potongan</a></li>
        <li class="active"><span>Ubah</span></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('potongan.ubah', $ptg->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Potongan</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Nama Pegawai</label>
                                <select name="nip" class="form-control select2" required>
                                    <option value="">--Pilih Pegawai--</option>
                                    @foreach ($pegawai as $pgw)
                                        <option @if($pgw->nip == $ptg->nip) selected @endif value="{{ $pgw->nip }}">{{ $pgw->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Simpan Pinjam</label>
                                <input type="number" class="form-control" name="simpan_pinjam" placeholder="Masukkan Potongan Simpan Pinjam"
                                    required value="{{ $ptg->pot_simpan_pinjam }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Konsumsi Wajib</label>
                                <input type="number" class="form-control" name="konsumsi_wajib" placeholder="Masukkan Potongan Konsumsi Wajib"
                                    required value="{{ $ptg->pot_konsumsi_wajib }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Potongan Uang Duka</label>
                                <input type="number" class="form-control" name="uang_duka" placeholder="Masukkan Potongan Uang Duka"
                                    required value="{{ $ptg->uang_duka }}">
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
@endsection
