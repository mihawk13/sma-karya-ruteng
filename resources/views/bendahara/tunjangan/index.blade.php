@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Tunjangan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Tunjangan</span></li>
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
                    <a href="{{ route('tunjangan.tambah') }}" class="btn btn-success">Tambah</a>
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
                                        <th>Jabatan</th>
                                        <th>T. Fungsional</th>
                                        <th>T. Jabatan</th>
                                        <th>T. Pengabdian</th>
                                        <th>T. Istri / Suami</th>
                                        <th>T. Anak</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tunjangan as $tjg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tjg->nama_jabatan }}</td>
                                        <td>{{ number_format($tjg->fungsional) }}</td>
                                        <td>{{ number_format($tjg->jabatan) }}</td>
                                        <td>{{ number_format($tjg->pengabdian) }}</td>
                                        <td>{{ number_format($tjg->istri_suami) }}</td>
                                        <td>{{ number_format($tjg->anak) }}</td>
                                        <td>{{ number_format($tjg->fungsional+$tjg->jabatan+$tjg->pengabdian+$tjg->istri_suami+$tjg->anak) }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $tjg->id }})" type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Ubah Data Tunjangan"><i
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
        let url = "{{ route('tunjangan.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
