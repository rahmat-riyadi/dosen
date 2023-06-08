<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Upload Pembimbing</h5>
            <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3 d-flex flex-column">
                    <label for="inputSK" class="form-label">SK Pembimbing</label>
                    <input type="file" wire:model.lazy="file" class="form-control" id="inputSK" placeholder="">
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Pembimbing 1</label>
                    <select wire:model.lazy="dosen_1_id" class="form-select form-control @error('dosen_1_id') is-invalid @enderror" name="dosen_1_id" id="">
                        <option></option>
                        @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                    @error('dosen_1_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Pembimbing 2</label>
                    <select wire:model.lazy="dosen_2_id" class="form-select form-control @error('dosen_2_id') is-invalid @enderror" name="dosen_2_id" id="">
                        <option></option>
                        @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                    @error('dosen_2_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Judul Skripsi</label>
                    <textarea wire:model.lazy="judul" class="form-control h-100 @error('judul') is-invalid @enderror" name="" id="" rows="3"></textarea>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" wire:click="handleSubmit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>