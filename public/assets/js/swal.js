document.querySelectorAll(".success").forEach(e => e.addEventListener('click', function () {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        width: 350,
        showConfirmButton: false,
        timer: 1500
    });
}));