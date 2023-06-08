<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajukan Bimbingan</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
    </div>
    <div class="modal-body">
        <form class='d-flex flex-column gap-4'>
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Pilih Pembimbing</label>
                    <select wire:model.lazy="dosen_id" class="form-select position-relative form-control @error('tanggal') is-invalid @enderror">
                        <option></option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Pertemuan</label>
                    <input wire:model.lazy="pertemuan" type="number" class="form-control position-relative @error('pertemuan') is-invalid @enderror" >
                </div>
            </div>
            <div class="row">
                <label for="" class="form-label">Waktu Bimbingan</label>
                <div class="col-md-6">
                    <input wire:model.lazy="tanggal" class="form-control position-relative @error('tanggal') is-invalid @enderror" type="date" >
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input wire:model.lazy="waktu" class='form-control position-relative @error('waktu') is-invalid @enderror' type="time" >
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="inputSK" class="form-label">Draft</label>
                <input type="file" wire:model.lazy="file" class="form-control" id="inputSK" placeholder="">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="submit" wire:click="handleSubmit" form='ajukanBimbinganForm' class="btn btn-primary" >Simpan</button>
    </div>
</div>