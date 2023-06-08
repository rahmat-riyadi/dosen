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
</head>

<body>

    <!-- Setelah upload pembimbing -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex w-100 justify-content-end">
                    <div class='nav-item d-flex'>
                        <div class='text-end me-3'>
                            <p class='fw-semibold'>Rahmat Riyadi</p>
                            <p class='nim'>60200118064</p>
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
            <div class="text-white mb-3 d-flex flex-column flex-md-row justify-content-between">
                <div>
                    <p class='mb-2 fw-bold h6'>Selamat datang, Abdul Rahman</p>
                    <small>Semoga bimbingan skripsimu menyenangkan!</small>
                </div>
                <div>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#ajukanBimbingan">Ajukan Bimbingan</button>
                </div>
            </div>
            <div class="row d-flex gap-3 gap-md-0">
                <div class="col-12 col-md-6">
                    <div class='bg-white rounded-3 px-4 py-3 h-100'>
                        <p class='pb-2'>Judul Skripsi</p>
                        <div class="fw-semibold border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                            <small class='mb-4 mb-md-0'>Evaluasi dan Rekomendasi Tampilan Antarmuka E-Learning Lentera UIN Alauddin Makassar dengan Metode Double Diamond</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class='bg-white rounded-3 px-4 py-3 h-100'>
                        <p class='pb-2'>Nama Pembimbing</p>
                        <div class="fw-semibold border d-flex rounded-3 flex-column flex-md-row justify-content-between align-items-center px-4 py-4">
                            <ol class='mb-0'>
                                <li><small>Dr. Ridwan A. Kambau, S.T,. M.Kom.</small></li>
                                <li><small>Ir. Andi Muhammad Syafar, S.T,. M.Kom.</small></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
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
                    <tr>
                        <td>Dr. Ridwan A. Kambau, S.T,. M.Kom</td>
                        <td class='text-center'>1</td>
                        <td>12-05-2023, 10:00 WITA</td>
                        <td>Silahkan datang 15 menit sebelum waktu bimbingan</td>
                        <td>
                            <div class="badge rounded-pill text-bg-success">Jadwal Diterima</div>
                        </td>
                        <td class='d-flex gap-3'>
                            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#lihatFile">Lihat File</button>
                            <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#detailCatatan">Catatan</button>

                        </td>
                    </tr>
                    <tr>
                        <td>Dr. Ridwan A. Kambau, S.T,. M.Kom</td>
                        <td class='text-center'>1</td>
                        <td>12-05-2023, 10:00 WITA</td>
                        <td>-</td>
                        <td>
                            <div class="badge rounded-pill text-bg-warning">Menunggu</div>
                        </td>
                        <td><button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#lihatFile">Lihat File</button></td>
                    </tr>
                    <tr>
                        <td>Dr. Ridwan A. Kambau, S.T,. M.Kom</td>
                        <td class='text-center'>1</td>
                        <td>12-05-2023, 10:00 WITA</td>
                        <td>Silahkan datang 15 menit sebelum waktu bimbingan</td>
                        <td>
                            <div class="badge rounded-pill text-bg-danger">Atur Ulang Jadwal</div>
                        </td>
                        <td><button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#lihatFile">Lihat File</button></td>
                    </tr>
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

            <!-- <div class='bi bi-chevron-left text rounded-5  px-1' style='-webkit-text-stroke: 1px;' id='prevBtn'></div>
            <div class='bi bi-chevron-right rounded-5 px-1' style='-webkit-text-stroke: 1px;' id='nextBtn'></div> -->
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
                        <iframe src="../../assets/sample.pdf" t width="100%" height="100%"></iframe>
                    </div>
                </div> v
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Catatan -->
    <div class="modal fade" id="detailCatatan" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailBimbingan">Detail Aktivitas</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="col-12">
                            <small>Catatan</small>
                            <p class='fw-semibold'>Silahkan datang 15 menit sebelum waktu bimbingan </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ajukan Bimbingan -->
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

    <!-- Modal Ubah Password -->
    <div class="modal fade" id="ubahPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></p>
                </div>
                <div class="modal-body">
                    <form action="" class='d-flex flex-column gap-4'>
                        <div>
                            <label for="passwordLama" class='form-label'>Password Lama</label>
                            <input class='form-control' type="text" id='passwordLama'>
                        </div>
                        <div>
                            <label for="passwordBaru" class='form-label'>Password Baru</label>
                            <input class='form-control' type="text" id='passwordBaru'>
                        </div>
                        <div>
                            <label for="konfirmasiPassword" class='form-label'>Konfirmasi Password</label>
                            <input class='form-control' type="text" id='konfirmasiPassword'>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary success" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Bimbingan -->
    <!-- <div class="modal fade" id="detailBimbingan" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailBimbingan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailBimbingan">Detail Aktivitas</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-5">
                                <p>Nama Pembimbing</p>
                                <p>Dr. Ridwan A. Kambau, S.T,. M.Kom</p>
                            </div>
                            <div class="col-md-5">
                                <p>Pertemuan</p>
                                <p>1</p>
                            </div>
                            <div class="col-md-5">
                                <p>Waktu Bimbingan</p>
                                <p>12-05-2023, 10.00 Wita</p>
                            </div>
                            <div class="col-md-5">
                                <p>Status</p>
                                <div class="badge rounded-pill text-bg-success">Terima</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Deskripsi</p>
                            <p>Silahkan datang 15 menit sebelum waktu bimbingan </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal Hasil Bimbingan -->
    <!-- <div class="modal fade" id="uploadHasilBimbingan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="uploadHasilBimbinganLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Hasil Bimbingan</h5>
                    <p class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="" class="form-label">Pilih Pembimbing</label>
                            <select class="form-select form-select-sm" name="" id="">
                                <option selected>-</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi Revisi</label>
                            <textarea class="form-control" name="" id="" rows="3"></textarea>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="fileRevisi" class="form-label">File Revisi</label>
                            <span>
                                <label for="fileRevisi" class="form-label bg-secondary p-2 rounded-1">Pilih
                                    File</label>
                            </span>
                            <input type="file" class="form-control" name="" id="fileRevisi" placeholder="" hidden>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div> -->



    <footer class='bg-primary text-white text-center py-3'><small>©️2023 BimbinganSkripsi</small></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script src="../../js/calendar.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/coswise/hicon-js@latest/hicon.min.js"></script>
    <script>
        hicon.replace();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        function displayfilename() {
            $('#inputSK').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#fileName').html(fileName);
            })
        };
    </script>
    <script src="../../js/swal.js"></script>
</body>

</html>