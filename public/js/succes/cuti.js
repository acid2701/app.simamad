document.getElementById("showAlertButton").addEventListener("click", () => {
    // Menampilkan SweetAlert2 dengan opsi draggable
    Swal.fire({
        title: "Selamat!",
        text: "Pengajuan anda sudah dikirim!",
        icon: "success",
        showCloseButton: true,
        showConfirmButton: true,
        allowOutsideClick: false, // Tidak memperbolehkan klik di luar untuk menutup
        didOpen: () => {
            const popup = Swal.getPopup();
            if (popup) {
                popup.style.cursor = "move"; // Enable cursor move untuk draggable

                // Menambahkan logika drag-and-drop
                let isDragging = false;
                let offsetX, offsetY;

                // Saat mouse ditekan
                popup.onmousedown = (e) => {
                    isDragging = true;
                    offsetX = e.clientX - popup.getBoundingClientRect().left;
                    offsetY = e.clientY - popup.getBoundingClientRect().top;
                    popup.style.transition = "none"; // Matikan transisi agar lebih responsif
                };

                // Saat mouse digerakkan
                document.onmousemove = (e) => {
                    if (isDragging) {
                        popup.style.left = e.clientX - offsetX + "px";
                        popup.style.top = e.clientY - offsetY + "px";
                    }
                };

                // Saat mouse dilepaskan
                document.onmouseup = () => {
                    isDragging = false;
                    popup.style.transition = "all 0.3s ease"; // Menambahkan transisi saat selesai drag
                };
            }
        },
    });
});
