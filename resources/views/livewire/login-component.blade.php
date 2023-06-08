<div class='login-box border py-4 px-3'>
    <div class='row text-center'>
        <h2 class='fw-bold'>Login</h2>
        <p class='text-info'>Silahkan masukkan NIM/NIP/NIDN dan password anda</p>
    </div>
    <form wire:submit.prevent="login" class='px-3'>
        <div class="mb-3">
            <label for="inputNIMNIPNIDN" class="form-label">NIM/NIP/NIDN</label>
            <input type="text" wire:model.lazy="username" class="form-control @error('password') is-invalid @enderror" id="inputNIMNIPNIDN">
            @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror " id="inputPassword">
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-md btn-danger mb-4 w-100 py-3">Masuk</button>
    </form>
    <div class="d-flex col-12 justify-content-center gap-1">
        <p>Anda belum memiliki akun?</p>
        <a class='text-danger register-btn' href="/register">Daftar</a>
    </div>
</div>