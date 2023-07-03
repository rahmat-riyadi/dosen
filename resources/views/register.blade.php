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
    <link rel="stylesheet" href="./style.css">
</head>

<body>



    <div class="px-5 row align-items-center justify-content-center" style="height: 100vh;" >
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class='text-center'>
                        <h3 class='fw-bold mb-0 mt-1'>Daftar</h3>
                        <p class='text-muted mt-0'>Silahkan masukkan data anda</p>
                    </div>
                    <form class='px-3' action="/register" method="post" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" id="name" required >
                        </div>
                        <div class="mb-3">
                            <label for="inputNIMNIPNIDN" class="form-label">NIM/NIP/NIDN</label>
                            <input name="nip" type="number" class="form-control" id="inputNIMNIPNIDN">
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="inputPassword" required >
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Pilih Status</label>
                            <select class="form-select position-relative form-control" name="status" id="" required>
                                <option value="" >Pilih Status</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>
                        <div class="nim-input d-none">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input name="judul" type="text" class="form-control" id="nim">
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <input name="semester" type="number" class="form-control" id="semester">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger mb-4 w-100 py-3">Daftar</button>
                    </form>
                    <div class="d-flex col-12 justify-content-center gap-1">
                        <p>Sudah memiliki akun?</p>
                        <a class='text-danger register-btn' href="/login">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        const nimInput = document.querySelector('.nim-input')
        const status = document.querySelector('select[name=status]')

        status.addEventListener('change',(el) => {
            console.log(el.target.value)

            if(el.target.value == 'mahasiswa'){
                nimInput.classList.remove('d-none')
            } else {
                nimInput.classList.add('d-none')
            }

        })

    </script>
</body>

</html>