<script>
    $(document).ready(function() {
        $('#tableHarga').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('harga/getHargaProduk'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = $('#select2Basic').val();
                    d.keterangan = $('#basic-icon-default-fullname').val();
                    d.kode = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "produk"
                },
                {
                    data: "kode",
                }, {
                    data: 'keterangan'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "status",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data == 1) {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'OPEN' + '</span>';
                        } else {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'GANGGUAN' + '</span>';
                        }
                    }

                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'Daftar Harga Produk',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
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

    // Fungsi untuk mendapatkan style berdasarkan status
    function getStatusStyle(status) {
        switch (status) {
            case 0:
                return 'bg-label-danger'; // Warning
            case 1:
                return 'bg-label-success'; // Success
            default:
                return ''; // Default style
        }
    }

    $('#btnExport').on('click', function() {
        $('#tableHarga').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnSubmit').on('click', function() {
        if ($.fn.DataTable.isDataTable('#tableHarga')) {
            $('#tableHarga').DataTable().destroy();
        }
        $('#tableHarga').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('harga/getHargaProduk'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = $('#select2Basic').val();
                    d.keterangan = $('#basic-icon-default-fullname').val();
                    d.kode = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "produk"
                },
                {
                    data: "kode",
                }, {
                    data: 'keterangan'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "status",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data == 1) {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'OPEN' + '</span>';
                        } else {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'GANGGUAN' + '</span>';
                        }
                    }

                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'Daftar Harga Produk',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    $('#btnReset').on('click', function() {
        $('#basic-icon-default-fullname').val(null);
        $('#basic-icon-default-fullname1').val(null);
        $('#select2Basic').val(null).trigger('change');
        reload();

    });

    function reload() {
        if ($.fn.DataTable.isDataTable('#tableHarga')) {
            $('#tableHarga').DataTable().destroy();
        }
        $('#tableHarga').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('harga/getHargaProduk'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = $('#select2Basic').val();
                    d.keterangan = $('#basic-icon-default-fullname').val();
                    d.kode = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "produk"
                },
                {
                    data: "kode",
                }, {
                    data: 'keterangan'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "status",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data == 1) {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'OPEN' + '</span>';
                        } else {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'GANGGUAN' + '</span>';
                        }
                    }

                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'Daftar Harga Produk',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    }
</script>

<script>
    $('#btnSubmit1').click(function() {
        var checkboxes = document.querySelectorAll('.form-check-input');
        var isChecked = false;
        var values = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                isChecked = true;
            }
        });
        if (!isChecked) {
            var checkboxes = document.querySelectorAll('.form-check-input');
            checkboxes.forEach(function(checkbox) {
                values.push(checkbox.value);
            });
            var values = [];
            checkboxes.forEach(function(checkbox) {
                values.push(checkbox.value);
            });

            // Kirim data ke controller menggunakan AJAX
            $.ajax({
                url: '<?php echo base_url('harga/link_generate'); ?>',
                method: 'POST',
                data: {
                    produk: values
                },
                success: function(response) {
                    // Handle response dari controller jika diperlukan
                    var checkboxString = values.join(',');
                    document.getElementById("basic-icon-default-fullname").value = "<?php echo base_url() ?>link/list_harga?id=<?php echo $link_id ?>&produk=" + checkboxString;
                    document.getElementById("basic-icon-default-fullnamee").value = "<?php echo base_url() ?>link/json_harga?id=<?php echo $link_id ?>&produk=" + checkboxString;
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

                    // Kosongkan array values
                    values = [];

                    alert('Berhasil Generate')

                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi
                    alert('Gagal Generate')
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

                    // Kosongkan array values
                    var values = [];
                }
            });
        } else {
            var checkboxes = document.querySelectorAll('.form-check-input:checked');
            var values = [];
            checkboxes.forEach(function(checkbox) {
                values.push(checkbox.value);
            });

            // Kirim data ke controller menggunakan AJAX
            $.ajax({
                url: '<?php echo base_url('harga/link_generate'); ?>',
                method: 'POST',
                data: {
                    produk: values
                },
                success: function(response) {
                    // Handle response dari controller jika diperlukan
                    var checkboxString = values.join(',');
                    document.getElementById("basic-icon-default-fullname").value = "<?php echo base_url() ?>link/list_harga?id=<?php echo $link_id ?>&produk=" + checkboxString;
                    document.getElementById("basic-icon-default-fullnamee").value = "<?php echo base_url() ?>link/json_harga?id=<?php echo $link_id ?>&produk=" + checkboxString;
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

                    // Kosongkan array values
                    values = [];

                    alert('Berhasil Generate')

                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi
                    alert('Gagal Generate')
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

                    // Kosongkan array values
                    var values = [];
                }
            });

        }
    });

    function copyText() {
        var input = document.getElementById('basic-icon-default-fullname');
        var text = input.value;

        // Buat elemen baru dan tambahkan teks ke dalamnya
        var tempInput = document.createElement("textarea");
        tempInput.value = text;

        // Sembunyikan elemen dari tampilan pengguna
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        document.body.appendChild(tempInput);

        // Pilih dan salin teks dari elemen baru
        tempInput.select();
        document.execCommand("copy");

        // Hapus elemen sementara
        document.body.removeChild(tempInput);

        alert('Berhasil Disalin');
    }

    function copyText1() {
        var input = document.getElementById('basic-icon-default-fullnamee');
        var text = input.value;

        // Buat elemen baru dan tambahkan teks ke dalamnya
        var tempInput = document.createElement("textarea");
        tempInput.value = text;

        // Sembunyikan elemen dari tampilan pengguna
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        document.body.appendChild(tempInput);

        // Pilih dan salin teks dari elemen baru
        tempInput.select();
        document.execCommand("copy");

        // Hapus elemen sementara
        document.body.removeChild(tempInput);

        alert('Berhasil Disalin');
    }
</script>

<script>
    $(document).ready(function() {
        $('#tableJualHarga').DataTable();
    });
    $('#select2Basic5').change(function() {
        var country_id = $(this).val();

        // Request Ajax untuk mendapatkan kota berdasarkan negara
        $.ajax({
            url: "<?php echo base_url('harga/getProdukbyKategori'); ?>",
            method: "POST",
            dataType: "json",
            data: {
                op_produk: country_id
            },
            success: function(data) {
                // Menghapus semua option pada select box kota
                $('#select2Basic6').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic6').append('<option value="">Pilih Produk</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic6').append('<option value="' + city.op_id + '">' + city.op_nama + '</option>');
                });

                // Memperbarui Select2 setelah menambahkan option baru
            }
        });
    });

    $('#btnSubmitF').click(function() {
        var op_produk = $('#select2Basic6').val();
        if (op_produk === null || op_produk === '' || op_produk === undefined) {
            alert('Pilih Produk Terlebih Dahulu');
        } else {
            if ($.fn.DataTable.isDataTable('#tableJualHarga')) {
                $('#tableJualHarga').DataTable().destroy();
            }

            $('#tableJualHarga').DataTable({
                processing: true,
                serverSide: false, // Set to false for client-side processing
                ajax: {
                    url: '<?php echo base_url('harga/getHargaJual'); ?>',
                    type: "POST", // Metode pengiriman data (POST)
                    data: function(d) {
                        // Kirim parameter ke metode di Controller Anda
                        d.produk = op_produk;
                    },
                    dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
                },
                columns: [{
                        data: 'vo_kode'
                    }, {
                        data: "vo_nominal"
                    },
                    {
                        data: "vo_harga_reseller",
                        render: function(data, type, row) {
                            // Ubah format nilai numerik menjadi format mata uang Indonesia
                            return formatCurrency(data);
                        }
                    },
                    {
                        data: "harga_jual_user",
                        render: function(data, type, row) {
                            // Ubah format nilai numerik menjadi format mata uang Indonesia
                            return formatCurrency(data);
                        }
                    },
                    {
                        // Kolom baru dengan tombol untuk membuka modal
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-outline-primary" onclick="openModal(\'' + data.vo_nominal + '\', \'' + data.vo_kode + '\', \'' + data.vo_harga_reseller + '\', \'' + data.harga_jual_user + '\')" id="btnSubmitF"><span class="tf-icons bx bx-pencil me-1"></span></button>';
                        }
                    }
                ],
                order: [
                    [0, 'desc'] // Mengurutkan kolom pertama secara descending
                ],
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    filename: 'Daftar Harga Produk',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }]
            });
        }
    });

    function reloadHarga() {
        var op_produk = $('#select2Basic6').val();
        if (op_produk === null || op_produk === '' || op_produk === undefined) {
            alert('Pilih Produk Terlebih Dahulu');
        } else {
            if ($.fn.DataTable.isDataTable('#tableJualHarga')) {
                $('#tableJualHarga').DataTable().destroy();
            }

            $('#tableJualHarga').DataTable({
                processing: true,
                serverSide: false, // Set to false for client-side processing
                ajax: {
                    url: '<?php echo base_url('harga/getHargaJual'); ?>',
                    type: "POST", // Metode pengiriman data (POST)
                    data: function(d) {
                        // Kirim parameter ke metode di Controller Anda
                        d.produk = op_produk;
                    },
                    dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
                },
                columns: [{
                        data: 'vo_kode'
                    }, {
                        data: "vo_nominal"
                    },
                    {
                        data: "vo_harga_reseller",
                        render: function(data, type, row) {
                            // Ubah format nilai numerik menjadi format mata uang Indonesia
                            return formatCurrency(data);
                        }
                    },
                    {
                        data: "harga_jual_user",
                        render: function(data, type, row) {
                            // Ubah format nilai numerik menjadi format mata uang Indonesia
                            return formatCurrency(data);
                        }
                    },
                    {
                        // Kolom baru dengan tombol untuk membuka modal
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-outline-primary" onclick="openModal(\'' + data.vo_nominal + '\', \'' + data.vo_kode + '\', \'' + data.vo_harga_reseller + '\', \'' + data.harga_jual_user + '\')" id="btnSubmitF"><span class="tf-icons bx bx-pencil me-1"></span></button>';
                        }
                    }
                ],
                order: [
                    [0, 'desc'] // Mengurutkan kolom pertama secara descending
                ],
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    filename: 'Daftar Harga Produk',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }]
            });
        }
    }

    function openModal(vo_nominal, vo_kode, harga_reseller, harga_jual) {
        $('#modalHarga').modal('show');
        $('#kode_produk').val(vo_kode);
        $('#nama_produk').val(vo_nominal);

        var dengan_rupiah2 = document.getElementById('hrg_jual_lama');


        dengan_rupiah2.value = formatRupiah(harga_jual, 'Rp. ');

        var dengan_rupiah = document.getElementById('hrg_jual_reseller');
        dengan_rupiah.value = formatRupiah(harga_reseller, 'Rp. ');


        var dengan_rupiah1 = document.getElementById('hrg_jual');
        dengan_rupiah1.addEventListener('keyup', function(e) {
            dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
        });



    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }

    $('#btnSaveHarga').click(function() {
        var kode = $('#kode_produk').val();
        var harga = $('#hrg_jual').val();
        var harga_lama = $('#hrg_jual_lama').val();
        var harga_reseller = $('#hrg_jual_reseller').val();
        var harga1 = harga.split('.').join(''); // Menghapus koma dari string
        var harga2 = harga_lama.split('.').join(''); // Menghapus koma dari string
        var harga3 = harga_reseller.split('.').join(''); // Menghapus koma dari string

        if (kode === null || kode === undefined || kode === '') {
            alert('Kode Produk Tidak Boleh Kosong');
        } else if (harga === null || harga === undefined || harga === '' || harga === 0) {
            alert('Harga Jual Wajib Diisi');
        } else if (parseInt(harga1) < parseInt(harga2)) {
            alert('Harga Baru Tidak Boleh Lebih Kecil Dari Harga Lama');
        } else if (parseInt(harga1) < parseInt(harga3)) {
            alert('Harga Baru Tidak Boleh Lebih Kecil Dari Harga Reseller');
        } else {
            $.ajax({
                url: "<?php echo base_url('harga/updateHarga'); ?>",
                method: "POST",
                dataType: "json",
                data: {
                    kode: kode,
                    harga: harga
                },
                success: function(data) {
                    // Menghapus semua option pada select box kota
                    if (data.status_code === 200) {
                        $('#modalHarga').modal('hide');
                        $('#hrg_jual').val(null);
                        alert(data.messages);
                        reloadHarga();
                    } else {
                        alert(data.messages);
                    }

                    // Memperbarui Select2 setelah menambahkan option baru
                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi
                    alert('Terjadi Kesalahan')
                }
            });
        }


    });

    $('#btnResetF').on('click', function() {
        $('#select2Basic5').val(null).trigger('change');
        $('#select2Basic6').val(null).trigger('change');
        $('#tableJualHarga').DataTable().clear().draw();
    });
</script>