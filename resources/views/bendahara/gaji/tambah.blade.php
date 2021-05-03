@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Gaji</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Gaji</a></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('gaji.tambah') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gaji</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Periode</label>
                                <select name="periode" class="form-control select2" required>
                                    <option value="">--Pilih Periode--</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Tanggal</label>
                                <div class='input-group date'>
                                    <input name="tanggal" type='text' class="form-control" required
                                        value="{{ old('tanggal') }}" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            @livewire('gaji')
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('gaji') }}" type="button" class="btn btn-danger">Kembali</a>
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
