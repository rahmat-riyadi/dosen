<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="aturUlangJadwal">Atur Ulang Jadwal Bimbingan</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
    </div>
    <div class="modal-body">
        <form class='d-flex gap-4 flex-column' action="">
            <div class='col-md-12'>
                <label for="catatanTerima" class='form-label'>Catatan</label>
                <textarea wire:model.lazy="note" class='form-control h-100' name="" id="catatanTerima" rows='3'></textarea>
            </div>
            <div class='col-md-12'>
                <label for="catatanTerima" class='form-label'>Waktu Bimbingan Awal</label>
                <input readonly class='form-control position-relative old-date' type="text" name="" id="">
            </div>
            <div class="row">
                <label for="" class="form-label">Waktu Bimbingan</label>
                <div class="col-md-6">
                    <input wire:model.lazy="tanggal" min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" class='form-control position-relative' type="date" name="" id="">
                </div>
                <div class="col-md-6">
                    <input wire:model.lazy="waktu" class='form-control position-relative' type="time" name="" id="">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="handleReschedule()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
    </div>
</div>