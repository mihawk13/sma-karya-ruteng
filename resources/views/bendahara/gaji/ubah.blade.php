@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Cuti</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Guru</a></li>
        <li><a href="/">Cuti</a></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('cuti.guru.ubah', $ct->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Cuti</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Tanggal Ambil Cuti</label>
                                <div class='input-group date'>
                                    <input name="awal_cuti" type='text' class="form-control" required
                                        value="{{ $ct->awal_cuti }}" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tanggal Akhir Cuti</label>
                                <div class='input-group date'>
                                    <input name="akhir_cuti" type='text' class="form-control" required
                                        value="{{ $ct->akhir_cuti }}" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Surat Keterangan Cuti <small>(kosongkan jika tidak
                                        diubah)</small></label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Keterangan</label>
                                <input type="text" class="form-control" name="ket"
                                    placeholder="Masukkan Keterangan Cuti Anda" required value="{{ $ct->keterangan }}">
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
