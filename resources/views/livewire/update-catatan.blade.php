<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Catatan</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <label for="catatanTerima" class='form-label'>Catatan</label>
        <textarea wire:model.lazy="note" class='form-control h-100' id="catatanTerima" rows='3'></textarea>
        @error('note') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="modal-footer">
        <button type="button" onclick="handleSubmitCatatan()" class="btn btn-primary" >Simpan</button>
    </div>
</div>