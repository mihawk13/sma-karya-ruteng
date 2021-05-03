@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Cuti</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Guru</a></li>
        <li class="active"><span>Cuti</span></li>
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
                    <a href="{{ route('cuti.guru.tambah') }}" class="btn btn-success">Tambah</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Tahun</th>
                                        <th>Tgl Ambil Cuti</th>
                                        <th>Tgl Akhir Cuti</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuti as $ct)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ct->periode }}</td>
                                        <td>{{ $ct->tahun }}</td>
                                        <td>{{ $ct->awal_cuti }}</td>
                                        <td>{{ $ct->akhir_cuti }}</td>
                                        <td>{{ $ct->keterangan }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $ct->id }})" type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Ubah Data Cuti"><i
                                                        class="fa fa-pencil"></i></button>
                                            </center>
                                        </td>
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
<script>
    function openLink(id) {
        let url = "{{ route('cuti.guru.ubah', 'id') }}"
        url = url.replace('id', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
