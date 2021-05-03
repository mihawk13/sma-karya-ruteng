@extends('layouts.app')

@section('css')
<style>
    img {
        border: 1px solid #555;
    }
</style>
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Cuti</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Cuti</a></li>
        <li class="active"><span>Detail</span></li>
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
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Cuti</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label mb-10">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" readonly
                                value="{{ $ct->pegawai->nama }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Periode</label>
                            <input type="text" class="form-control" name="per" readonly value="{{ $ct->periode }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Tahun</label>
                            <input type="text" class="form-control" name="thn" readonly value="{{ $ct->tahun }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Tanggal Ambil Cuti</label>
                            <input name="awal_cuti" type="text" class="form-control" value="{{ \Carbon\Carbon::parse($ct->awal_cuti)->translatedFormat('d M Y') }}"  readonly/>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Tanggal Akhir Cuti</label>
                            <input name="akhir_cuti" type='text' class="form-control" readonly
                                value="{{ \Carbon\Carbon::parse($ct->akhir_cuti)->translatedFormat('d M Y') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Lama Cuti</label>
                            <input type="text" class="form-control" name="lama" readonly value="{{ \Carbon\Carbon::parse($ct->awal_cuti)->diffInDays($ct->akhir_cuti) + 1 . ' Hari' }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Keterangan</label>
                            <input type="text" class="form-control" name="ket"
                                placeholder="Masukkan Keterangan Cuti Anda" readonly value="{{ $ct->keterangan }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Surat Keterangan Cuti</label><br>
                            @if (Str::substr($ct->file, Str::length($ct->file) - 3, 3) == 'pdf')
                            <a href="{{ Storage::url('cuti/' . $ct->file) }}" type="button"
                                class="btn btn-success btn-lg">Download Surat</a>
                            @else
                            <img src="{{ Storage::url('cuti/' . $ct->file) }}" width="500" height="500" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('cuti') }}" type="button" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Konfirmasi Cuti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
@endsection
