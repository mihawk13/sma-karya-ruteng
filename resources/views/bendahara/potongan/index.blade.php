@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Potongan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Potongan</span></li>
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
                    <a href="{{ route('potongan.tambah') }}" class="btn btn-success">Tambah</a>
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
                                        <th>Nama Pegawai</th>
                                        <th>Pot. Simpan Pinjam</th>
                                        <th>Pot. Konsumsi Wajib</th>
                                        <th>Pot. Uang Duka</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($potongan as $ptg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ptg->pegawai->nama }}</td>
                                        <td>{{ number_format($ptg->pot_simpan_pinjam) }}</td>
                                        <td>{{ number_format($ptg->pot_konsumsi_wajib) }}</td>
                                        <td>{{ number_format($ptg->uang_duka) }}</td>
                                        <td>{{ number_format($ptg->pot_simpan_pinjam+$ptg->pot_konsumsi_wajib+$ptg->uang_duka) }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $ptg->id }})" type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Ubah Data Potongan"><i
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
        let url = "{{ route('potongan.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
