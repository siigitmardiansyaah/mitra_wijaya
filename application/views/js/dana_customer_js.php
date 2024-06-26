<script>
$('#select2Basic1').change(function() {
    var country_id = $(this).val();

    // Request Ajax untuk mendapatkan kota berdasarkan negara
    $.ajax({
        url: "<?php echo base_url('dana_customer/getCity'); ?>",
        method: "POST",
        dataType: "json",
        data: {
            prov_id: country_id
        },
        success: function(data) {
            if (data === null || data === undefined) {
                alert('Data Kabupaten / Kota Tidak Ditemukan');
                $('#select2Basic2').empty();
            } else {
                $('#select2Basic2').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic2').append('<option value="">Pilih Kota / Kabupaten</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic2').append('<option value="' + city.KycRegency + '">' +
                        city.KycRegency + '</option>');
                });
            }
            // Menghapus semua option pada select box kota


            // Memperbarui Select2 setelah menambahkan option baru
        }
    });
});

$('#select2Basic2').change(function() {
    var country_id = $(this).val();

    // INI UNTUK DAPETIN KECAMATAN
    $.ajax({
        url: "<?php echo base_url('dana_customer/getDist'); ?>",
        method: "POST",
        dataType: "json",
        data: {
            city_id: country_id
        },
        success: function(data) {
            if (data === null || data === undefined) {
                alert('Data Kecamatan Tidak Ditemukan');
                $('#select2Basic3').empty();
            } else {
                // Menghapus semua option pada select box kota
                $('#select2Basic3').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic3').append('<option value="">Pilih Kecamatan</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic3').append('<option value="' + city.KycDistrict + '">' +
                        city.KycDistrict + '</option>');
                });
            }
            // Memperbarui Select2 setelah menambahkan option baru
        }
    });
    // INI UNTUK DAPETIN KECAMATAN

    // INI UNTUK DAPETIN KODE POS
    $.ajax({
        url: "<?php echo base_url('dana_customer/getKodePOS'); ?>",
        method: "POST",
        dataType: "json",
        data: {
            city_id: country_id
        },
        success: function(data) {
            if (data === null || data === undefined) {
                alert('Data Kode POS Tidak Ditemukan');
                $('#select2Basic4').empty();
            } else {
                // Menghapus semua option pada select box kota
                $('#select2Basic4').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic4').append('<option value="">Pilih Kode POS</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic4').append('<option value="' + city.KycPostcode + '">' +
                        city.KycPostcode + '</option>');
                });
            }
            // Memperbarui Select2 setelah menambahkan option baru
        }
    });
    // INI UNTUK DAPETIN KODE POS
});

function validatePhoneNumber(input) {
    // Menghapus semua karakter selain angka
    input.value = input.value.replace(/[^0-9]/g, '');

    if (input.value.length > 0 && input.value[0] !== '6') {
        // Ganti angka pertama dengan 6 dan biarkan angka setelahnya tetap
        input.value = '62' + input.value.substring(1);
    }

    // Jika input panjangnya hanya 1 angka dan angka tersebut bukan 6, tambahkan 2 setelah 6
    if (input.value.length === 1 && input.value[0] !== '6') {
        input.value = '62';
    }
}
</script>

<script>
// INI BUAT LOGO
const inputLogo = document.getElementById("logo");
const avatarlogo = document.getElementById("avatarlogo");
const textArealogo = document.getElementById("textArealogo");
// INI BUAT LOGO
const convertBase64logo = (file) => {
    return new Promise((resolve, reject) => {
        const fileReaderlogo = new FileReader();
        fileReaderlogo.readAsDataURL(file);

        fileReaderlogo.onload = () => {
            resolve(fileReaderlogo.result);
        };

        fileReaderlogo.onerror = (error) => {
            reject(error);
        };
    });
};

const uploadImagelogo = async (event) => {
    const filelogo = event.target.files[0];
    const base64logo = await convertBase64logo(filelogo);
    avatarlogo.src = base64logo;
    textArealogo.value = base64logo;
    console.log(base64logo);
};

$('#logo').on('change', function(e) {
    var file = e.target.files[0];
    if (file) {
        var img = new Image();
        img.onload = function() {
            if (this.width <= 200 && this.height <= 200) {
                // Dimensi gambar sesuai dengan batas maksimum
                uploadImagelogo(e); // Panggil fungsi untuk mengunggah gambar
            } else {
                alert("Ukuran gambar tidak boleh lebih dari 200x200 piksel.");
                resetFileInput(); // Reset input file jika dimensi tidak valid
            }
        };
        img.src = URL.createObjectURL(file);
    }
});

function resetFileInput() {
    // Fungsi untuk mereset input file jika dimensi tidak valid
    $('#logo').val(''); // Mengosongkan nilai input file
}
</script>

<script>
const input = document.getElementById("foto_ktp");
const avatar = document.getElementById("avatar");
const textArea = document.getElementById("textArea");

const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.onload = () => {
            resolve(fileReader.result);
        };

        fileReader.onerror = (error) => {
            reject(error);
        };
    });
};

const uploadImage = async (event) => {
    const file = event.target.files[0];
    const base64 = await convertBase64(file);
    avatar.src = base64;
    textArea.value = base64;
    console.log(base64);
};

$('#foto_ktp').on('change', function(e) {
    uploadImage(e);
});
</script>

<?php if($data->status == 'approve') : ?>
<script type="text/javascript">
$('#tableProduk').DataTable({
    processing: true,
    serverSide: false, // Set to false for client-side processing
    ajax: {
        url: '<?php echo base_url('dana_customer/getProduk'); ?>',
        type: "GET", // Metode pengiriman data (POST)
        dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
    },
    columns: [{
            data: "vo_kode_trx"
        },
        {
            data: "vo_harga_reseller",
            render: function(data, type, row) {
                // Ubah format nilai numerik menjadi format mata uang Indonesia
                return formatCurrency(data);
            }
        }, 
        {
            data: "vo_harga",
            render: function(data, type, row) {
                // Ubah format nilai numerik menjadi format mata uang Indonesia
                return formatCurrency(data);
            }
        }, {
            data: "vo_nominal"
        },
        {
            data: "op_nama"
        },
    ],
    order: [
        [4, 'desc'] // Mengurutkan kolom pertama secara descending
    ],
    rowGroup: {
        dataSrc: 'op_nama'
    }
});

function formatCurrency(amount) {
        // Fungsi untuk memformat nilai numerik menjadi format mata uang Indonesia
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        return formatter.format(amount);
    }
</script>
<?php endif; ?>