<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
    </div>
    <div class="modal-body">
        {{-- <form action="" class='d-flex flex-column gap-4'> --}}
            <div>
                <label for="passwordLama" class='form-label'>Password Lama</label>
                <input class="form-control @error('oldPass') is-invalid @enderror"  wire:model.lazy="oldPass" type="text" id='passwordLama'>
                @error('oldPass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="passwordBaru" class='form-label'>Password Baru</label>
                <input class="form-control @error('newPass') is-invalid @enderror" wire:model.lazy="newPass" type="text" id='passwordBaru'>
                @error('newPass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="konfirmasiPassword" class='form-label'>Konfirmasi Password</label>
                <input class="form-control @error('confirmPass') is-invalid @enderror " wire:model.lazy="confirmPass" type="text" id='konfirmasiPassword'>
                @error('confirmPass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        {{-- </form> --}}
    </div>
    <div class="modal-footer">
        <button wire:click="handleSubmit" type="button" class="btn btn-primary">Simpan</button>
    </div>
</div>