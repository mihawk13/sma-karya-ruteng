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
                                                <button onclick="openLink({{ $pg->id }})" type="button"
                                                    class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Ubah Data Pegawai"><i class="fa fa-pencil"></i></button>
                                                @if ($pg->id !== auth()->user()->pegawai_id)
                                                <button type="button"
                                                    class="btn btn-danger btn-icon-anim btn-square btn-sm"
                                                    data-toggle="modal" data-placement="left"
                                                    data-target="#hapus{{ $pg->id }}" title="Hapus Data Pegawai"><i
                                                        class="fa fa-trash"></i></button>
                                                @endif

                                            </center>
                                        </td>
                                    </tr>
                                    <div id="hapus{{ $pg->id }}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('pegawai.hapus', $pg->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Konfirmasi</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Apakah anda yakin menghapus data ini?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect"
                                                            data-dismiss="modal">Tidak</button>
                                                        <button type="submit"
                                                            class="btn btn-success waves-effect waves-light">Iya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
        let url = "{{ route('pegawai.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
