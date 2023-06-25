<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajukan Bimbingan</h5>
        <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
    </div>
    <div class="modal-body">
        <form class='d-flex flex-column gap-4'>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Pilih Pembimbing</label>
                    <select wire:model.lazy="dosen_id" class="form-select position-relative form-control @error('tanggal') is-invalid @enderror">
                        <option></option>
                        @foreach ($dosens as $dosen)
                            @if (!in_array($dosen->id, $pendingDosen))
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <label for="" class="form-label">Waktu Bimbingan</label>
                <div class="col-md-6">
                    <input wire:model.lazy="tanggal" min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" class="form-control position-relative @error('tanggal') is-invalid @enderror" type="date" >
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input wire:model.lazy="waktu"  min="08:00" max="15:00" class='form-control position-relative @error('waktu') is-invalid @enderror' type="time" >
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="inputSK" class="form-label">File Skripsi (Max 2MB)</label>
                <input type="file" onchange="checkSize(this)" wire:model.lazy="file" class="form-control" id="inputSK" placeholder="">
                @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="submit" wire:click="handleSubmit" form='ajukanBimbinganForm' class="btn btn-primary" >Simpan</button>
    </div>
</div>