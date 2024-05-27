<script>
    const ipAddressInput = document.getElementById('delimiter-mask');

    ipAddressInput.addEventListener('input', function(event) {
        let value = event.target.value;
        value = value.replace(/[^0-9.,]/g, ''); // Hanya mengizinkan angka, titik, dan koma
        const addresses = value.split(',').map(address => address.trim()); // Memisahkan alamat IP dengan koma sebagai pemisah

        for (let i = 0; i < addresses.length; i++) {
            let parts = addresses[i].split('.').map(part => parseInt(part)); // Memisahkan bagian-bagian alamat IP dan mengonversi ke angka

            if (parts.length > 4) {
                parts.splice(4);
            }

            addresses[i] = parts.map(part => isNaN(part) ? '' : Math.max(0, Math.min(part, 255))).join('.'); // Memastikan setiap bagian dalam rentang 0-255
        }

        event.target.value = addresses.join(','); // Menggabungkan alamat IP kembali dengan koma sebagai pemisah
    });
</script>