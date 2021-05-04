<div>
    <div class="form-group" wire:ignore>
        <label class="control-label mb-10">Nama Pegawai</label>
        <select name="nip" id="nip" class="form-control select2" required>
            <option value="">--Pilih Pegawai--</option>
            @foreach ($pegawai as $pgw)
            <option value="{{ $pgw->nip }}">{{ $pgw->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Gaji Pokok</label>
        <input type="number" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok"
            readonly value="{{ $gapok }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Tunjangan</label>
        <input type="number" class="form-control" name="tunjangan" placeholder="Tunjangan"
            readonly value="{{ $tunjangan }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Potongan</label>
        <input type="number" class="form-control" name="potongan" placeholder="Potongan"
            readonly value="{{ $potongan }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Bonus Lembur</label>
        <input type="number" class="form-control" name="bonus_lembur" placeholder="Bonus Lembur"
            readonly value="{{ $bonus }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Total Gaji</label>
        <input type="number" class="form-control" name="total_gaji" placeholder="Total Gaji"
            readonly value="{{ $totalGaji }}">
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function () {
        $('#nip').on('change', function (e) {
            var nip = $('#nip').val();
            @this.set('nip', nip);
        });
    });

</script>

@endpush
