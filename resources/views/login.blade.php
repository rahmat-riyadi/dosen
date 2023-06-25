<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    @livewireStyles
</head>

<body>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class='d-flex justify-content-center align-items-center login'>
        @livewire('login-component')
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast" id="alert-toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="bi bi-x-circle-fill text-danger me-2"></i>
                    <strong class="me-auto">Pemberitahuan</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                  Pengguna tidak ditemukan
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        const toast = document.querySelector('#alert-toast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)

        Livewire.on('loginFailed', () => {
            toastBootstrap.show()
        })
    </script>
</body>

</html>