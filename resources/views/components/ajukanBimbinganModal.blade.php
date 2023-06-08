<div class="modal fade" id="ajukanBimbingan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ajukanBimbingan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajukan Bimbingan</h5>
                <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
            </div>
            <div class="modal-body">
                <form id='ajukanBimbinganForm' class='d-flex flex-column gap-4'>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Pilih Pembimbing</label>
                            <select class="form-select position-relative form-control" name="" id="" required>
                                <option></option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Pilih Pertemuan</label>
                            <select class="form-select form-control" name="" id="" required>
                                <option></option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="form-label">Waktu Bimbingan</label>
                        <div class="col-md-6">
                            <input class='form-control position-relative' type="date" name="" id="" required>
                        </div>
                        <div class="col-md-6">
                            <input class='form-control position-relative' type="time" name="" id="" required>
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="inputSK" class="form-label">Draft</label>
                        <span onclick="displayfilename()">
                            <label for="inputSK" class="form-label bg-secondary p-2 rounded-1">Pilih
                                File</label>
                            <span id='fileName' class='ms-3'>Tidak ada file yang dipilih</span>
                        </span>
                        <input type="file" class="form-control" name="" id="inputSK" placeholder="" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form='ajukanBimbinganForm' class="btn btn-primary success" data-bs-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>