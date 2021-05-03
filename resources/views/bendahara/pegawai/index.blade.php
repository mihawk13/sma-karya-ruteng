@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Pegawai</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Pegawai</span></li>
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
                    <a href="{{ route('pegawai.tambah') }}" class="btn btn-success">Tambah</a>
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
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>JK</th>
                                        <th>No Telp</th>
                                        <th>Tanggal Mulai Kerja</th>
                                        <th>Jabatan</th>
                                        <th>No Rekening</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pg)
                                    <tr>
                                        <td>{{ $pg->nip }}</td>
                                        <td>{{ $pg->nama }}</td>
                                        <td>{{ $pg->jk }}</td>
                                        <td>{{ $pg->telp }}</td>
                                        <td>{{ $pg->tgl_mulai }}</td>
                                        <td>{{ $pg->jabatan }}</td>
                                        <td>{{ $pg->no_rekening }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $pg->id }})" type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Ubah Data Pegawai"><i
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
        let url = "{{ route('pegawai.ubah', 'id') }}"
        url = url.replace('id', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
