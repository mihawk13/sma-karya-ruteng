@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Lama Masa Kerja</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Lama Masa Kerja</span></li>
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
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Tahun Mulai Kerja</th>
                                        <th>Lama Masa Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pg)
                                    @php
                                    $lamaBulan =
                                    \Carbon\Carbon::parse($pg->tgl_mulai)->diffInMonths(date('M'));
                                    $lamaTahun = \Carbon\Carbon::parse($pg->tgl_mulai)->diffInYears(date('Y'));

                                    if ($lamaTahun == 0) {
                                    $lamaKerja = $lamaBulan . ' Bulan';
                                    } else {
                                    $lamaBulan -= ($lamaTahun * 12);
                                    $lamaKerja = $lamaTahun . ' Tahun ' . $lamaBulan . ' Bulan';
                                    }
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pg->nama }}</td>
                                        <td>{{ $pg->jabatan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pg->tgl_mulai)->translatedFormat('Y') }}</td>
                                        <td>{{ $lamaKerja }}</td>
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
        let url = "{{ route('pegawai.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
