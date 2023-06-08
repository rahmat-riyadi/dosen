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
    <div class='d-flex justify-content-center align-items-center login'>
        <div class='login-box border py-4 px-3'>
            <div class='row text-center'>
                <h2 class='fw-bold'>Daftar</h2>
                <p class='text-info'>Silahkan masukkan data anda</p>
            </div>
            <form class='px-3'>
                <div class="mb-3">
                    <label for="inputNIMNIPNIDN" class="form-label">NIM/NIP/NIDN</label>
                    <input type="email" class="form-control" id="inputNIMNIPNIDN">
                </div>
                <div class="mb-4">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Pilih Status</label>
                    <select class="form-select position-relative form-control" name="" id="" required>
                        <option>Pilih Status</option>
                        <option value="">Mahasiswa</option>
                        <option value="">Dosen</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger mb-4 w-100 py-3">Daftar</button>
            </form>
            <div class="d-flex col-12 justify-content-center gap-1">
                <p>Sudah memiliki akun?</p>
                <a class='text-danger register-btn' href="./login.html">Masuk</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>