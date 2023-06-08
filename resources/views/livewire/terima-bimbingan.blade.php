<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="terimaBimbingan">Terima Bimbingan</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <label for="catatanTerima" class='form-label'>Catatan</label>
        <textarea wire:model.lazy="note" class='form-control h-100' name="" id="catatanTerima" rows='3'></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="handleAcc(this)" class="btn btn-primary" >Simpan</button>
    </div>
</div>