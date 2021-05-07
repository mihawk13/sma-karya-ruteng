@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Gaji</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Gaji</span></li>
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
                    <a href="{{ route('gaji.tambah') }}" class="btn btn-success">Tambah</a>
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
                                        <th>Periode</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Bonus</th>
                                        <th>Potongan</th>
                                        <th>Total Gaji</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $gj)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gj->pegawai->nama }}</td>
                                        <td>{{ $gj->periode }}</td>
                                        <td>{{ number_format($gj->gaji_pokok) }}</td>
                                        <td>{{ number_format($gj->tunjangan) }}</td>
                                        <td>{{ number_format($gj->bonus) }}</td>
                                        <td>{{ number_format($gj->potongan) }}</td>
                                        <td>{{ number_format($gj->total_gaji) }}</td>
                                        {{-- <td>
                                            <center>
                                                <button onclick="openLink({{ $gj->id }})" type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Ubah Data Cuti"><i
                                                        class="fa fa-pencil"></i></button>
                                            </center>
                                        </td> --}}
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
        let url = "{{ route('gaji.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
