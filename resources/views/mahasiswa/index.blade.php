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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/mahasiswa.css') }}">
    @livewireStyles
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex w-100 justify-content-end">
                    <div class='nav-item d-flex'>
                        <div class='text-end me-3'>
                            <p class='fw-semibold'>{{ auth()->user()->nama }}</p>
                            <p class='nim'>{{ auth()->user()->nim }}</p>
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
            <div class="text-white mb-3 d-flex flex-column flex-md-row justify-content-between mt-4">
                <div>
                    <p class='mb-2 fw-bold h6'>Selamat datang, {{ auth()->user()->nama }}</p>
                    <small>Semoga bimbingan skripsimu menyenangkan!</small>
                </div>
                @if (count(auth()->user()->bimbingan1) > 0)
                <div>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#ajukanBimbingan">Ajukan Bimbingan</button>
                </div>
                @endif
            </div>
            @if (count(auth()->user()->bimbingan1) == 0)
            <div class="bg-white rounded-3 px-4 py-3">
                <p class='pb-2'>Status Bimbingan</p>
                <div class="border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                    <div>
                        <i class="bi bi-file-earmark-text mx-2"></i>
                        <small class='mb-4 mb-md-0'>Anda belum memasukkan nama pembimbing skripsi, silahkan masukkan nama
                            pembimbing
                            untuk mengatur
                            jadwal bimbingan</small>
                    </div>
                    <button type="button" class="btn btn-sm px-3 btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Upload Pembimbing
                    </button>
                </div>
            </div>
            @else
            <div class="row d-flex gap-3 gap-md-0">
                <div class="col-12 col-md-6">
                    <div class='bg-white rounded-3 px-4 py-3 h-100'>
                        <p class='pb-2'>Judul Skripsi</p>
                        <div class="fw-semibold border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                            <small class='mb-4 mb-md-0'>{{ auth()->user()->bimbingan1[0]->pivot->judul }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class='bg-white rounded-3 px-4 py-3 h-100'>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class='pb-2'>Nama Pembimbing</p>
                            <button type="button" class="btn btn-sm btn-outline-warning px-2 rounded-1 py-2" style="font-size: 12px !important;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Upload Ulang SK
                            </button>
                        </div>
                        <div class="fw-semibold border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                            <ol class='mb-0'>
                                <li><small>{{ auth()->user()->bimbingan1[0]->nama }}</small></li>
                                <li><small>{{ auth()->user()->bimbingan2[0]->nama }}</small></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Aktivitas Bimbingan -->
    <main class='container-fluid px-5'>
        <p class='fw-bold'>Aktivitas Bimbingan</p>
        <div class="table-responsive">
            <table class="table align-middle fw-semibold">
                <thead>
                    <tr>
                        <th>Nama Pembimbing</th>
                        <th class='text-center'>Pertemuan</th>
                        <th>Waktu Bimbingan</th>
                        <th class='w-25'>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count(auth()->user()->jadwal) != 0)
                        @foreach (auth()->user()->jadwal as $jadwal)
                        <tr>
                            <td>{{ $jadwal->nama }}</td>
                            <td class='text-center'>{{ $jadwal->pivot->pertemuan }}</td>
                            <td>{{ $jadwal->pivot->tanggal }}, {{ $jadwal->pivot->waktu }}</td>
                            <td>{{ $jadwal->pivot->catatan }}</td>
                            <td>
                                @if ($jadwal->pivot->status == 'Jadwal Diterima')
                                <div class="badge rounded-pill text-bg-success">
                                    {{ $jadwal->pivot->status }}
                                </div>
                                @elseif($jadwal->pivot->status == 'Menunggu')
                                <div class="badge rounded-pill text-bg-warning">
                                    {{ $jadwal->pivot->status }}
                                </div>
                                @else
                                <div class="badge rounded-pill text-bg-danger">
                                    {{ $jadwal->pivot->status }}
                                </div>
                                @endif
                            </td>
                            <td class=' @if(!is_null($jadwal->pivot->file)) d-flex @endif gap-3'>
                                @if (!is_null($jadwal->pivot->file))
                                <button class="btn btn-outline-dark" onclick="handleClickDraft(this)" data-draf="{{ $jadwal->pivot->file }}" data-bs-toggle="modal" data-bs-target="#lihatFile">Lihat File</button>
                                @endif
                                @if ($jadwal->pivot->status == 'Jadwal Diterima')
                                    <button class="btn btn-success px-4" onclick="handleClickNote(this)" data-note="{{ $jadwal->pivot->catatan }}" data-bs-toggle="modal" data-bs-target="#detailCatatan">Catatan</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    <!-- Kalender -->
    <section class="container-fluid px-5 py-5">
        <h3>Kalender</h3>
        <div class='d-flex align-items-center gap-2'>
            <button id='todayBtn' type="button" class="btn btn-outline-dark rounded-5 fw-semibold">Hari ini</button>
            <button id='prevBtn' type="button" class="btn btn-outline-dark rounded-5">
                <div class='bi bi-chevron-left text rounded-5  px-1' style='-webkit-text-stroke: 1px;'></div>
            </button>
            <button id='nextBtn' type="button" class="btn btn-outline-dark rounded-5">
                <div class='bi bi-chevron-right rounded-5 px-1' style='-webkit-text-stroke: 1px;'></div>
            </button>
            <p class='fw-semibold' id="current-date"></p>
        </div>
        <div id="calendar" style="height: 600px;"></div>
    </section>



    <!-- Modals -->

    <!-- Modal Lihat File -->
    <div class="modal fade" id="lihatFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Keputusan</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class='h-100'>
                        <iframe class="draf-frame" t width="100%" height="100%"></iframe>
                    </div>
                </div> v
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade skModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        @livewire('upload-s-k-modal')        
    </div>

    <div class="modal fade bimbinganModal" id="ajukanBimbingan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ajukanBimbingan" aria-hidden="true">
        <div class="modal-dialog">
            @livewire('ajukan-bimbingan')
        </div>
    </div>

    @include('components.detailCatatan')

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
    {{-- <script src="{{ asset('assets/js/calendar.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/coswise/hicon-js@latest/hicon.min.js"></script>
    <script>
        hicon.replace();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        function displayfilename(el) {

            const fileName = document.querySelector('#fileName')

            console.log(el)

            fileName.innerHTML = el.files[0].name

        };
    </script>
    <script src="{{ asset('assets/js/swal.js') }}"></script>

    <script>

        const bimbinganModal = new bootstrap.Modal(document.querySelector('.bimbinganModal'))

        Livewire.on('handleSubmitBimbingan', data => {
            console.log(data)
            bimbinganModal.hide()
            swalWithBootstrapButtons.fire({
                title: data.status ? 'Berhasil' : 'Gagal',
                text: data.message,
                icon: data.status ? 'success' : 'error',
                confirmButtonText: 'Ok',
                reverseButtons: true
            }).then((result) => {
                window.location.reload()
            })
        })

    </script>

    <script>

        const skModal = new bootstrap.Modal(document.querySelector('.skModal'))
        const passModal = new bootstrap.Modal(document.querySelector('.passModal'))
        const swalWithBootstrapButtons = Swal.mixin({ customClass: { confirmButton: 'btn btn-danger font-light', }, buttonsStyling: false})

        Livewire.on('handleSubmitSK', data => {
            console.log(data)
            skModal.hide()
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

    <script>

        function checkSize(el){
            var file = el.files[0];
            var fileSize = file.size; // Ukuran file dalam bytes
            var maxSize = 2 * 1024 * 1024; // Batas maksimal 2MB (2 * 1024 * 1024 bytes)

            if (fileSize > maxSize) {
                alert('Ukuran file terlalu besar! Maksimum 2MB.');
                el.value = ''; // Mengosongkan input file
            }
        }

        function getRandomColor() {
            const colors = ['yellow', 'green', 'red', 'orange'];
            const random = Math.floor(Math.random() * colors.length);
            return colors[random];
        }

        function handleClickNote(el){
            const detailNote = document.querySelector('.detail-note')
            detailNote.innerHTML = el.dataset.note
        }

        function handleClickDraft(el){
            document
        }

        var schedule = {!! json_encode($schedule) !!}

        schedule = schedule.filter(e => e.status === 'Jadwal Diterima' || e.status === 'Atur Ulang Jadwal' )
        schedule = schedule.map(e => ({backgroundColor: getRandomColor(), ...e}))

        console.log(schedule)

        const Calendar = tui.Calendar;

        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const currentDate = document.getElementById('current-date');
        const todayBtn = document.getElementById('todayBtn')

        var cal = new Calendar('#calendar', {
            defaultView: 'month',
            // useFormPopup: true,
            enableClick: false,
            useDetailPopup: true,
            template: {
                task(event) {
                    return `<div style="width: 100%; color: #fff; background-color: rgb(161, 181, 108); border-radius: 2px; overflow: hidden; padding: 0 auto; height: 24px; line-height: 24px; opacity: 1;"><i class="bi bi-person" style="padding: 0 10px;"></i>${event.title}</div>`;
                },
            }
        });

        cal.setTheme({
            common: {
                nowIndicatorBullet: {
                backgroundColor: '#515ce6',
                },
            },
        });

        cal.createEvents(schedule)

        cal.setOptions({
            template: {
                popupDetailDate({ start }) {
                    let startDate = new Date(start);
                    return 'Waktu Pertemuan : ' + (moment(startDate.getTime()).format('HH:mm'));
                },
            },
        });

        function getCurrentDate() {
            let dates = cal.getDate();
            let dateString = dates.toString();
            let month = dateString.slice(4, 7);
            let year = dateString.slice(10, 15);

            currentDate.innerHTML = month + year;
        }

        getCurrentDate();

        prevBtn.addEventListener("click", e => {
            cal.prev();
            getCurrentDate();
        });

        nextBtn.addEventListener("click", e => {
            cal.next();
            getCurrentDate();
        });

        todayBtn.addEventListener("click", e => {
            cal.today();
            getCurrentDate();
        });


    </script>

</body>

</html>