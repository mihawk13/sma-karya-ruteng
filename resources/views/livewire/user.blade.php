<div>
    <div class="form-group" wire:ignore>
        <label class="control-label mb-10">Nama Pegawai {{ $pgw }}</label>
        <select name="pgw_id" id="pgw_id" class="form-control select2" required>
            <option value="">--Pilih Pegawai--</option>
            @foreach ($pegawai as $pgw)
            <option value="{{ $pgw->id }}">{{ $pgw->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Jabatan</label>
        <input wire:model="jabatan" type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan" required readonly>
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function () {
        $('#pgw_id').on('change', function (e) {
            var pgw_id = $('#pgw_id').val();
            @this.set('pgw', pgw_id);
        });
    });

</script>

@endpush
