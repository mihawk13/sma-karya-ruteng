@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Cuti</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
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
            <div class="panel-wrapper collapse in">
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
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
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
                                        <td>{{ $ct->pegawai->nama }}</td>
                                        <td>{{ $ct->periode }}</td>
                                        <td>{{ $ct->tahun }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ct->awal_cuti)->translatedFormat('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ct->akhir_cuti)->translatedFormat('d M Y') }}</td>
                                        <td>{{ $ct->keterangan }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $ct->id }})" type="button" class="btn btn-primary btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left" title="Detail Data Cuti"><i
                                                        class="fa fa-exclamation-circle"></i></button>
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
        let url = "{{ route('cuti.detail', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
