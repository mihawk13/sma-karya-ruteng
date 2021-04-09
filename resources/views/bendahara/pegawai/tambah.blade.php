@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Pegawai</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Pegawai</a></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('pegawai.tambah') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap"
                                    required value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Jenis Kelamin</label>
                                <select name="jk" class="form-control selectpicker" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    @foreach (getJenisKelamin() as $jk)
                                        <option value="{{ $jk }}">{{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tanggal Lahir</label>
                                <div class='input-group date'>
                                    <input name="tgl" type='text' class="form-control" required value="{{ old('tgl') }}" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
                                    required value="{{ old('alamat') }}" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tanggal Mulai Kerja</label>
                                <div class='input-group date'>
                                    <input name="tglMulai" type='text' class="form-control" required value="{{ old('tglMulai') }}"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">No Telepone</label>
                                <input type="number" class="form-control" name="telp" placeholder="Masukkan No Telepone"
                                    required data-error="Format Telepone Tidak Valid" value="{{ old('telp') }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">No Rekening</label>
                                <input type="number" class="form-control" name="rekening"
                                    placeholder="Masukkan No Rekening" required required
                                    data-error="Format No Rekening Tidak Valid" value="{{ old('rekening') }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Jabatan</label>
                                <select name="jabatan" class="form-control" required>
                                    <option value="">--Pilih Jabatan--</option>
                                    @foreach (getJabatan() as $jbt)
                                        <option value="{{ $jbt }}">{{ $jbt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Username</label>
                                <input type="text" class="form-control" name="user" placeholder="Masukkan Username"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('pegawai') }}" type="button" class="btn btn-danger">Kembali</a>
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
<!-- Moment JavaScript -->
<script src="{{ asset('assets/vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
<!-- Bootstrap Datetimepicker JavaScript -->
<script
    src="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
</script>

<script>
    $(document).ready(function() {
        $('.date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
            }).on('dp.show', function() {
            if($(this).data("DateTimePicker").date() === null)
                $(this).data("DateTimePicker").date(moment());
        });
    })
</script>
@endsection
