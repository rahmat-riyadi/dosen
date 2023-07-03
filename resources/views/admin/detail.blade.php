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
                    </div>
                    <div class='nav-item d-flex'>
                        <div class='text-end me-3'>
                            <p class='fw-semibold'>Admin</p>
                            <p class='nim'>Admin</p>
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
                                    <a class="text-decoration-none text-black" href="/logout">
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
            <div class="text-white mb-3 d-flex justify-content-between">
                <div>
                    <p class='mb-2 fw-bold h6'>{{ $mahasiswa->nama }}</p>
                    <small>{{ $mahasiswa->nim }}</small>
                </div>
                <div>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#lihatSK">Lihat SK</button>
                </div>
            </div>
            <div class="bg-white rounded-3 px-4 py-3">
                <small>Judul Skripsi</small>
                <div class="border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                    <small class='mb-4 mb-md-0 fw-semibold'>{{ $mahasiswa->judul }}</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Aktivitas Bimbingan -->
    <main class='container-fluid px-5'>
        <p class='fw-bold'>Riwayat Bimbingan</p>
        <div class="table-responsive">
            <table class="table align-middle fw-semibold">
                <thead>
                    <tr>
                        <th>Pertemuan</th>
                        <th>Waktu Bimbingan</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $item->pertemuan }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d-m-Y') }}, {{ $item->waktu }}</td>
                        <td>{{ $item->catatan }}</td>
                        <td>
                            @if ($item->status == 'Jadwal Diterima')
                            <div class="badge rounded-pill text-bg-success">
                                 {{ $item->status }}
                            </div>
                            @elseif($item->status == 'Menunggu')
                            <div class="badge rounded-pill text-bg-warning">
                                 {{ $item->status }}
                            </div>
                            @elseif($item->status == 'Terlaksana')
                            <div class="badge rounded-pill text-bg-info">
                                {{ $item->status }}
                            </div>
                            @elseif($item->status == 'Tidak Terlaksana')
                            <div class="badge rounded-pill text-bg-secondary">
                                {{ $item->status }}
                            </div>
                            @else
                            <div class="badge rounded-pill text-bg-danger">
                                {{ $item->status }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>



    <!-- Modals -->

    <!-- Modal Lihat File -->
    <div class="modal fade" id="lihatFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Keputusan</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
                </div>
                <div class="modal-body">
                    <div class='h-100'>
                        <iframe class="draf-modal" width="100%" height="100%"></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lihatSK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Keputusan</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class='h-100'>
                        <iframe src="{{ asset('storage/'.$bimbingan->file) }}" t width="100%" height="100%"></iframe>
                    </div>
                </div> v
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Catatan-->
    <div class="modal fade catatan-modal" id="tambahCatatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('update-catatan')
        </div>
    </div>

    <!-- Modal Ubah Password -->
    <div class="modal fade passModal" id="ubahPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('change-pass-modal')
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>

        let meetId;

        function getMeetId(btn){
            meetId = btn.dataset.meet
            document.querySelector('#catatanTerima').value = btn.dataset.note
        }

        const handleSubmitCatatan = () => {
            Livewire.emit('submitCatatan',meetId)
        }


    </script>

    <script>

        function handleClickFile(btn){
            document.querySelector('.draf-modal').src = btn.dataset.draf
        }

        const catatanModal = new bootstrap.Modal(document.querySelector('.catatan-modal'))
        const passModal = new bootstrap.Modal(document.querySelector('.passModal'))
        const swalWithBootstrapButtons = Swal.mixin({ customClass: { confirmButton: 'btn btn-danger font-light', }, buttonsStyling: false})

        Livewire.on('catatanSubmitted', data => {
            catatanModal.hide()
            swalWithBootstrapButtons.fire({
                title: 'Berhasil',
                text: data,
                icon: 'success',
                confirmButtonText: 'Ok',
                reverseButtons: true
            }).then((result) => {
                window.location.reload()
            })
        })

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