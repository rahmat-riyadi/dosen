<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../css/main.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dosen.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
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
                            <p class='fw-semibold'>admin</p>
                            <p class='nim'>admin</p>
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
            <div class="text-white mb-3">
                <h3>Selamat datang, admin</h3>
            </div>
        </div>
    </section>

    <!-- Aktivitas Bimbingan -->
    <main class='container-fluid px-5'>
        <h3>Pengajuan Bimbingan</h3>
        <div class="table-responsive">
            <table class="table align-middle fw-semibold">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Nim</th>
                        <th>Judul</th>
                        <th class="" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->judul }}</td>
                        <td class='d-flex gap-3 '>
                            <a href="/admin/dosen/{{ $dosen_id }}/mahasiswa/{{ $item->id }}" class="btn btn-outline-dark" >Lihat Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Kalender -->


    <!-- Modals -->

    <!-- Modal Terima Bimbingan -->
    <div class="modal fade accJadwalModal" id="terimaBimbingan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('terima-bimbingan')
        </div>
    </div>

    <!-- Modal Atur Ulang Jadwal Bimbingan -->
    <div class="modal fade rescheduleModal" id="aturUlangJadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('atur-ulang-bimbingan')
        </div>
    </div>

    <!-- Modal Lihat SK -->
    <div class="modal fade" id="lihatSK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Keputusan</h5>
                    <p class="btn-close " data-bs-dismiss="modal" aria-label="Close"></p>
                </div>
                <div class="modal-body">
                    <div>
                        <iframe class="sk-frame" src="../../assets/sample.pdf" t width="100%" height="400"></iframe>
                    </div>
                </div> v
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Password -->
    <div class="modal fade passModal" id="ubahPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('change-pass-modal')
        </div>
    </div>


    <footer class='bg-primary text-white text-center py-3'><small>©️2023 BimbinganSkripsi</small></footer>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    {{-- <script src="{{ asset('assets/js/calendarDosen.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/coswise/hicon-js@latest/hicon.min.js"></script>
    <script>
        hicon.replace();
    </script>
    <script src="{{ asset('assets/js/swal.js') }}"></script>


</body>

</html>