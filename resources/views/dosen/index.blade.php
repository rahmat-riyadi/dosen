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
                        <a class="nav-link active" aria-current="page" href="/dosen">Beranda</a>
                        <a class="nav-link " href="/dosen/bimbingan">Mahasiswa Bimbingan</a>
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
                <h3>Selamat datang, {{ auth()->user()->nama }}</h3>
                <small>Semoga dapat membimbing mahasiswa anda dengan baik!</small>
            </div>
            <div class="bg-white rounded-3 px-4 py-3">
                <p>Daftar Mahasiswa Bimbingan</p>
                <div class="table-responsive">
                    <table class='table align-middle fw-semibold'>
                        <thead>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th class='w-50'>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->judul }}</td>
                                <td>
                                    <button data-file="{{ asset('storage/'. $mahasiswa->file) }}" onclick="handleClickSK(this)" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#lihatSK">Lihat SK</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                        <th>NIM</th>
                        <th class='text-center'>Pertemuan</th>
                        <th>Waktu Bimbingan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->jadwal as $item)
                        @if ($item->pivot->status == 'Menunggu')
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td class='text-center'>{{ $item->pivot->pertemuan }}</td>
                                <td>{{ Carbon\Carbon::parse($item->pivot->tanggal)->format('d-m-Y') }}, {{ Carbon\Carbon::parse($item->pivot->waktu)->format('H:i:s') }} WITA</td>
                                <td class='d-flex gap-3'>
                                    <button data-meet="{{ $item->pivot->id }}" onclick="getMeetId(this)" class="btn btn-success acc-schedule" data-bs-toggle="modal" data-bs-target="#terimaBimbingan">Terima</button>
                                    <button data-meet="{{ $item->pivot->id }}" onclick="getMeetId(this)" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#aturUlangJadwal">Atur Ulang Jadwal</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
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

    <script>

        const scheduleAccepted = new bootstrap.Modal(document.querySelector('.accJadwalModal'))
        const rescheduleModal = new bootstrap.Modal(document.querySelector('.rescheduleModal'))
        const passModal = new bootstrap.Modal(document.querySelector('.passModal'))
        const swalWithBootstrapButtons = Swal.mixin({ customClass: { confirmButton: 'btn btn-danger font-light', }, buttonsStyling: false})

        Livewire.on('scheduleAccepted', data => {
            scheduleAccepted.hide()
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

        Livewire.on('scheduleReset', data => {
            rescheduleModal.hide()
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
            rescheduleModal.hide()
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

        let meetId;

        function getMeetId(btn){
            meetId = btn.dataset.meet
        }

        function handleAcc(){
            Livewire.emit('handleAcc', meetId)
        }

        function handleReschedule(){
            Livewire.emit('reschedule', meetId)
        }

        function handleClickSK(btn){
            const skFrame = document.querySelector('.sk-frame')
            skFrame.src = btn.dataset.file
        }

        const  accBtn = document.querySelector('.acc-schedule')

    </script>

    <script>

        var schedule = {!! json_encode($schedule) !!}

        schedule = schedule.filter(e => e.status === 'Jadwal Diterima' ||  e.status === 'Atur Ulang Jadwal')
        schedule = schedule.map(e => ({ backgroundColor : getRandomColor(), ...e }) )

        console.log(schedule)

        const Calendar = tui.Calendar;

        const todayBtn = document.getElementById('todayBtn');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const currentDate = document.getElementById('current-date');

        function getRandomColor() {
            const colors = ['yellow', 'green', 'red', 'orange'];
            const random = Math.floor(Math.random() * colors.length);
            return colors[random];
        }

        var cal = new Calendar('#calendar', {
        defaultView: 'month',
        // useFormPopup: true,
        // enableClick: false,
        // isReadOnly:true,
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

        todayBtn.addEventListener("click", e => {
            cal.today();
            getCurrentDate();
        });

        prevBtn.addEventListener("click", e => {
            cal.prev();
            getCurrentDate();
        });

        nextBtn.addEventListener("click", e => {
            cal.next();
            getCurrentDate();
        });


    </script>

</body>

</html>