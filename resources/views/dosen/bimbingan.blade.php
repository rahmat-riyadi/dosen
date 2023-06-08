<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/main.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dosen.css') }}">
    @livewireStyles
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex w-100 justify-content-between align-items-center">
                    <div class='d-flex gap-2'>
                        <a class="nav-link " aria-current="page" href="/dosen">Beranda</a>
                        <a class="nav-link active" href="./bimbingan.html">Mahasiswa Bimbingan</a>
                    </div>
                    <div class='nav-item d-flex'>
                        <div class='text-end me-3'>
                            <p class='fw-semibold'>{{ auth()->user()->nama }}</p>
                            <p class='nim'>{{ auth()->user()->nip }}</p>
                        </div>
                        <div class="dropdown d-flex align-items-center">
                            <img class='rounded-circle' height='40px' width='40px' src="https://wallpapers.com/images/hd/aesthetic-anime-profile-pictures-act70lmrgm5gxgbk.jpg" alt="">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-start">
                                <li class='px-2'>
                                    <button class='btn w-100 text-start' data-bs-toggle="modal" data-bs-target="#ubahPassword">
                                        Ubah Password
                                    </button>
                                </li>
                                <li class='px-2'>
                                    <a class="text-decoration-none text-black" href="../auth/login.html">
                                        <button class='btn w-100 text-start'>
                                            Logout
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class='bg-primary py-2 mb-4'>
        <div class='container-fluid py-4 px-5'>
            <div class="text-white">
                <h3>{{ auth()->user()->nama }}</h3>
                <small>Semoga dapat membimbing mahasiswa anda dengan baik!</small>
            </div>
        </div>
    </section>

    <!-- Content -->
    <main class='container-fluid px-5'>
        <h3>Mahasiswa Bimbingan</h3>
        <div class="table-responsive">
            <table class="table align-middle fw-semibold">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th class='w-50'>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="/dosen/bimbingan/detail/{{ $item->id }}">
                                <button class="btn btn-outline-dark">
                                    Lihat Detail
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>



    <!-- Modals -->

    @livewireScripts
    <!-- Modal Ubah Password -->
    <div class="modal fade passModal" id="ubahPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('change-pass-modal')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/swal.js') }}"></script>

    <script>

        const passModal = new bootstrap.Modal(document.querySelector('.passModal'))
        const swalWithBootstrapButtons = Swal.mixin({ customClass: { confirmButton: 'btn btn-danger font-light', }, buttonsStyling: false})

        Livewire.on('handleResetPass', data => {
            passModal.hide()
            console.log(data)
            swalWithBootstrapButtons.fire({
                title: 'Berhasil',
                text: data.message,
                icon: data.success ? 'success' : 'warning',
                confirmButtonText: 'Ok',
                reverseButtons: true
            }).then((result) => {
                window.location.reload()
            })
        })


    </script>

</body>

</html>