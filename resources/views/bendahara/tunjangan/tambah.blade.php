@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Tunjangan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Tunjangan</a></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('tunjangan.tambah') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tunjangan</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Nama Jabatan</label>
                                <select name="jbt" class="form-control selectpicker" required>
                                    <option value="">--Pilih Jabatan--</option>
                                    @foreach (getJabatan() as $jb)
                                        <option value="{{ $jb }}">{{ $jb }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tunjangan Fungsional</label>
                                <input type="number" class="form-control" name="fungsional" placeholder="Masukkan Tunjangan Fungsional"
                                    required value="{{ old('fungsional') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tunjangan Jabatan</label>
                                <input type="number" class="form-control" name="jabatan" placeholder="Masukkan Tunjangan Jabatan"
                                    required value="{{ old('jabatan') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tunjangan Pengabdian</label>
                                <input type="number" class="form-control" name="pengabdian" placeholder="Masukkan Tunjangan Pengabdian"
                                    required value="{{ old('pengabdian') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tunjangan Istri / Suami</label>
                                <input type="number" class="form-control" name="istri_suami" placeholder="Masukkan Tunjangan Istri / Suami"
                                    required value="{{ old('istri_suami') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tunjangan Anak</label>
                                <input type="number" class="form-control" name="anak" placeholder="Masukkan Tunjangan Anak"
                                    required value="{{ old('anak') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('tunjangan') }}" type="button" class="btn btn-danger">Kembali</a>
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
