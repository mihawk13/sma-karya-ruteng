@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Laporan Gaji</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Kepala Sekolah</a></li>
        <li class="active"><span>Laporan Gaji</span></li>
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
                <form method="POST" class="panel-body">
                    @csrf
                    <div class="form-group col-md-3">
                        <label class="control-label mb-10">Tahun</label>
                        <select class="form-control select2" name="tahun" required>
                            <option value="">-- Pilih Tahun --</option>
                            @foreach ($tahun as $th)
                            <option @if($thn == $th->tahun) selected @endif value="{{ $th->tahun }}">{{ $th->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label mb-10">Bulan</label>
                        <select class="form-control select2" name="bulan" required>
                            <option value="">-- Pilih Bulan --</option>
                            @foreach ($periode as $pr)
                            <option @if($prd == $pr->periode) selected @endif value="{{ $pr->periode }}">{{ $pr->periode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label text-hide mb-15">-</label><br>
                        <button type="submit" class="btn btn-success">Lihat</button>
                        @if ($thn != 0)
                        <a target="_blank" href="{{ route('lap.gaji.cetak', [$thn, $prd]) }}" class="btn btn-danger">Cetak</a>
                        @endif
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
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Nama Pegawai</th>
                                        <th>Periode</th>
                                        <th>Lama Masa Kerja</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Bonus</th>
                                        <th>Cuti</th>
                                        <th>Potongan</th>
                                        <th>Total Gaji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $gj)
                                    @php
                                    $lamaBulan =
                                    \Carbon\Carbon::parse($gj->pegawai->tgl_mulai)->diffInMonths(getBulanEng($gj->periode));
                                    $lamaTahun = \Carbon\Carbon::parse($gj->pegawai->tgl_mulai)->diffInYears(\Carbon\Carbon::parse($gj->tanggal)->format('Y'));

                                    if ($lamaTahun == 0) {
                                        $lamaKerja = $lamaBulan . ' Bulan';
                                    } else {
                                        $lamaBulan -= ($lamaTahun * 12);
                                        if($lamaBulan < 0){
                                            $lamaBulan = 12 + $lamaBulan;
                                            $lamaTahun -= 1;
                                            $lamaKerja = $lamaTahun . ' Tahun ' . $lamaBulan . ' Bulan';
                                        }elseif($lamaBulan == 0 || $lamaTahun > 0){
                                            $lamaKerja = $lamaTahun . ' Tahun ';
                                        }
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gj->pegawai->jabatan }}</td>
                                        <td>{{ $gj->pegawai->nama }}</td>
                                        <td>{{ $gj->periode }}</td>
                                        <td>{{ $lamaKerja }}</td>
                                        <td>{{ number_format($gj->gaji_pokok) }}</td>
                                        <td>{{ number_format($gj->tunjangan) }}</td>
                                        <td>{{ number_format($gj->bonus) }}</td>
                                        <td>{{ $gj->cuti }} hari</td>
                                        <td>{{ number_format($gj->potongan) }}</td>
                                        <td>{{ number_format($gj->total_gaji) }}</td>
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
