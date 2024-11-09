// public/js/sweetalert.js

document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach((form) => {
        form.querySelector(".confirm-delete").addEventListener(
            "click",
            function (event) {
                event.preventDefault();

                swal(
                    {
                        title: "Apakah kamu yakin?",
                        text: "Kamu tidak akan dapat memulihkan User ini!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Tidak, Batalkan !",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            form.submit(); // Mengirimkan form jika konfirmasi
                        } else {
                            swal(
                                "Dibatalkan",
                                "Selamat Data User Kamu Aman :)",
                                "error"
                            );
                        }
                    }
                );
            }
        );
    });
});
