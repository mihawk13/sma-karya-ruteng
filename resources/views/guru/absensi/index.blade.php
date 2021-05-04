@extends('layouts.app')

@section('css')
<!-- Bootstrap Datetimepicker CSS -->
<link
    href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="{{ asset('assets/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Absensi</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Guru</a></li>
        <li class="active"><span>Absensi</span></li>
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
            <div class="panel-heading">
                <div class="pull-left">
                    <h5>Absensi Saya</h5>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <form method="POST" class="panel-body">
                    @csrf
                    <div class="form-group col-md-3">
                        <label class="control-label mb-10">Periode</label>
                        <select class="form-control select2" name="periode" required>
                            <option value="">-- Pilih Periode --</option>
                            @foreach ($periode as $pr)
                            <option @if($prd == $pr->periode) selected @endif value="{{ $pr->periode }}">{{ $pr->periode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label mb-10">Tahun</label>
                        <select class="form-control select2" name="tahun" required>
                            <option value="">-- Pilih Tahun --</option>
                            @foreach ($tahun as $th)
                            <option @if($thn == $th->tahun) selected @endif value="{{ $th->tahun }}">{{ $th->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label text-hide mb-15">-</label><br>
                        <button type="submit" class="btn btn-success">Lihat</button>
                    </div>
                </form>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        {{-- <th>Nama Pegawai</th> --}}
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Keterlambatan</th>
                                        <th>Lembur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensi as $abs)
                                    <tr>
                                        {{-- <td>{{ $abs->pegawai->nama }}</td> --}}
                                        <td>{{ $abs->tanggal }}</td>
                                        <td>{{ $abs->jam_masuk }}</td>
                                        <td>{{ $abs->jam_pulang }}</td>
                                        <td>{{ \Carbon\Carbon::parse($abs->jam_masuk)->floatDiffInMinutes("07:30") . ' menit' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($abs->jam_pulang)->floatDiffInHours("13:00") . ' jam' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
