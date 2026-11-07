import Swal from "sweetalert2";

window.Swal = Swal;

// Notifikasi sukses
document.addEventListener("DOMContentLoaded", function () {
    const successMessage = document.querySelector('meta[name="flash-success"]');
    if (successMessage && successMessage.content) {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: successMessage.content,
            confirmButtonText: "OK",
            confirmButtonColor: "#2563eb",
        });
    }

    // Notifikasi error
    const errorMessage = document.querySelector('meta[name="flash-error"]');

    if (errorMessage && errorMessage.content) {
        Swal.fire({
            icon: "error",
            title: "Terjadi Kesalahan!",
            text: errorMessage.content,
            confirmButtonText: "OK",
            confirmButtonColor: "#dc2626",
        });
    }

    // Notifikasi Gagal Login
    const errorLogin = document.querySelector('meta[name="flash-errorLogin"]');

    if (errorLogin && errorLogin.content) {
        Swal.fire({
            icon: "error",
            title: "Login Gagal!",
            text: errorLogin.content,
            confirmButtonText: "OK",
            confirmButtonColor: "#dc2626",
        });
    }
});

// Konfirmasi Hapus Artikel
document.querySelectorAll(".form-delete").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Artikel yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc2626",
            cancelButtonColor: "#6b7280",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
