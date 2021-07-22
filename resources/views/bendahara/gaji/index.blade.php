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
                    {{-- <a href="{{ route('gaji.tambah') }}" class="btn btn-success">Tambah</a> --}}
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#tambah">Tambah</button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Gaji</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form data-toggle="validator" role="form" action="{{ route('gaji.tambah') }}"
                                    method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group" wire:ignore>
                                            <label class="control-label mb-10">Periode</label>
                                            <select name="periode" id="periode" class="form-control select2" required>
                                                <option value="">--Pilih Periode--</option>
                                                @foreach (getBulan() as $itm)
                                                <option value="{{ $itm }}">{{ $itm }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

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
                                        <th>Nama Pegawai</th>
                                        <th>Periode</th>
                                        <th>Lama Masa Kerja</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Bonus</th>
                                        <th>Cuti</th>
                                        <th>Potongan</th>
                                        <th>Total Gaji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $gj)
                                    @php
                                    $lamaBulan =
                                    \Carbon\Carbon::parse($gj->pegawai->tgl_mulai)->diffInMonths(getBulanEng($gj->periode));
                                    $lamaTahun =
                                    \Carbon\Carbon::parse($gj->pegawai->tgl_mulai)->diffInYears(\Carbon\Carbon::parse($gj->tanggal)->format('Y'));

                                    if ($lamaTahun == 0) {
                                    $lamaKerja = $lamaBulan . ' Bulan';
                                    } else {
                                    $lamaBulan -= ($lamaTahun * 12);
                                    if($lamaBulan < 0){ $lamaBulan=12 + $lamaBulan; $lamaTahun -=1;
                                        $lamaKerja=$lamaTahun . ' Tahun ' . $lamaBulan . ' Bulan' ;
                                        }elseif($lamaBulan==0 || $lamaTahun> 0){
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
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <button onclick="openLink({{ $gj->id }})" type="button"
                                                        class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Ubah Data Gaji"><i class="fa fa-pencil"></i></button>

                                                    <button type="button"
                                                        class="btn btn-danger btn-icon-anim btn-square btn-sm"
                                                        data-toggle="modal" data-placement="left"
                                                        data-target="#hapus{{ $gj->id }}" title="Hapus Data Gaji"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div id="hapus{{ $gj->id }}" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('gaji.hapus', $gj->id) }}">
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
        let url = "{{ route('gaji.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
