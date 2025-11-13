import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Jalankan skrip setelah DOM (halaman) selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
    // Temukan SEMUA tombol toggle password di halaman
    const toggleButtons = document.querySelectorAll("[data-toggle-password]");

    toggleButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Dapatkan target input dari atribut 'data-target-input'
            const targetInputId = this.dataset.targetInput;
            const input = document.querySelector(targetInputId);

            // Dapatkan kedua ikon di dalam tombol
            const iconEye = this.querySelector(".icon-eye");
            const iconEyeSlash = this.querySelector(".icon-eye-slash");

            if (input && iconEye && iconEyeSlash) {
                // Ubah tipe input
                if (input.type === "password") {
                    input.type = "text";
                    iconEye.classList.add("hidden"); // Sembunyikan ikon mata
                    iconEyeSlash.classList.remove("hidden"); // Tampilkan ikon mata coret
                } else {
                    input.type = "password";
                    iconEye.classList.remove("hidden"); // Tampilkan ikon mata
                    iconEyeSlash.classList.add("hidden"); // Sembunyikan ikon mata coret
                }
            }
        });
    });
});
