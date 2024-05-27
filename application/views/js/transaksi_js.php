<script>
    var autoReload = false;
    var intervalID; // Variabel untuk menyimpan ID interval
    $('#tableTransaksi').DataTable({
        processing: true,
        serverSide: false, // Set to false for client-side processing
        ordering: false, // Menonaktifkan pengurutan untuk semua kolom
        ajax: {
            url: '<?php echo base_url('transaksi/getHistory'); ?>',
            type: "POST", // Metode pengiriman data (POST)
            data: function(d) {
                // Kirim parameter ke metode di Controller Anda
                d.produk = $('#select2Basic').val();
                d.tgl_1 = $('#html5-date-input2').val();
                d.tgl_2 = $('#html5-date-input3').val();
                d.no_id = $('#basic-icon-default-fullname').val();
                d.status = $('#select2Basic1').val();
            },
            dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
        },
        columns: [{
                data: "tanggal",
                render: function(data, type, row) {
                    // Ubah format tanggal dari "yyyy-mm-dd HH:MM:SS" menjadi "dd/mm/yyyy H:i"
                    var dateObj = new Date(data);
                    var day = dateObj.getDate();
                    var month = dateObj.getMonth() + 1;
                    var year = dateObj.getFullYear();
                    var hours = dateObj.getHours();
                    var minutes = dateObj.getMinutes();
                    var seconds = dateObj.getSeconds(); // Tambahkan variabel untuk detik

                    // Tambahkan leading zero jika diperlukan
                    if (day < 10) {
                        day = '0' + day;
                    }
                    if (month < 10) {
                        month = '0' + month;
                    }
                    if (hours < 10) {
                        hours = '0' + hours;
                    }
                    if (minutes < 10) {
                        minutes = '0' + minutes;
                    }
                    if (seconds < 10) { // Tambahkan leading zero untuk detik
                        seconds = '0' + seconds;
                    }

                    var formattedDate = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes + ':' + seconds; // Tambahkan detik ke dalam format
                    return formattedDate;
                },
                className: "clickable"
            }, {
                data: 'provider'
            }, {
                data: 'nominal'
            }, {
                data: 'no_hp'
            },
            {
                data: "harga",
                render: function(data, type, row) {
                    // Ubah format nilai numerik menjadi format mata uang Indonesia
                    return formatCurrency(data);
                }
            }, {
                data: "harga_jual",
                render: function(data, type, row) {
                    // Ubah format nilai numerik menjadi format mata uang Indonesia
                    return formatCurrency(data);
                }
            }, {
                data: "income",
                render: function(data, type, row) {
                    // Ubah format nilai numerik menjadi format mata uang Indonesia
                    return formatCurrency(data);
                }
            },
            {
                data: "status",
                render: function(data, type, row) {
                    // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + getTextStatus(data).toUpperCase() + '</span>';
                }
            }
        ],
        order: [
            [0, 'desc'] // Mengurutkan kolom pertama secara descending
        ],
        columnDefs: [{
                type: "date",
                targets: 0
            } // Menggunakan tipe data "date" untuk kolom pertama
        ],
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export to Excel',
            filename: 'History Transaksi',
            exportOptions: {
                modifier: {
                    page: 'all'
                }
            }
        }]
    });

    $('#btnSubmit').click(function() {
        if ($.fn.DataTable.isDataTable('#tableTransaksi')) {
            $('#tableTransaksi').DataTable().destroy();
        }

        $('#tableTransaksi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('transaksi/getHistory'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = $('#select2Basic').val();
                    d.tgl_1 = $('#html5-date-input2').val();
                    d.tgl_2 = $('#html5-date-input3').val();
                    d.no_id = $('#basic-icon-default-fullname').val();
                    d.status = $('#select2Basic1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tanggal",
                    render: function(data, type, row) {
                        // Ubah format tanggal dari "yyyy-mm-dd HH:MM:SS" menjadi "dd/mm/yyyy H:i"
                        var dateObj = new Date(data);
                        var day = dateObj.getDate();
                        var month = dateObj.getMonth() + 1;
                        var year = dateObj.getFullYear();
                        var hours = dateObj.getHours();
                        var minutes = dateObj.getMinutes();
                        var seconds = dateObj.getSeconds(); // Tambahkan variabel untuk detik

                        // Tambahkan leading zero jika diperlukan
                        if (day < 10) {
                            day = '0' + day;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }
                        if (hours < 10) {
                            hours = '0' + hours;
                        }
                        if (minutes < 10) {
                            minutes = '0' + minutes;
                        }
                        if (seconds < 10) { // Tambahkan leading zero untuk detik
                            seconds = '0' + seconds;
                        }

                        var formattedDate = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes + ':' + seconds; // Tambahkan detik ke dalam format
                        return formattedDate;
                    },
                    className: "clickable"
                }, {
                    data: 'provider'
                }, {
                    data: 'nominal'
                }, {
                    data: 'no_hp'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "harga_jual",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "income",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + getTextStatus(data).toUpperCase() + '</span>';
                    }
                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            columnDefs: [{
                    type: "date",
                    targets: 0
                } // Menggunakan tipe data "date" untuk kolom pertama
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'History Transaksi',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    $('#animationModal').on('hide.bs.modal', function() {

        var doc = document.getElementById("tr_status");
        if (doc.innerHTML == 'CL' || doc.innerHTML == 'RF') {
            document.getElementById("tr_status").classList.remove("badge", "bg-label-danger");
        } else if (doc.innerHTML == 'WP') {
            document.getElementById("tr_status").classList.remove("badge", "bg-label-warning");
        } else if (doc.innerHTML == 'OK') {
            document.getElementById("tr_status").classList.remove("badge", "bg-label-success");
        } else if(doc.innerHTML == 'IP') {
            document.getElementById("tr_status").classList.remove("badge", "bg-label-info");
        } else {
            document.getElementById("tr_status").classList.remove("badge", "bg-label-secondary");
        }
    });

    $('#tableTransaksi tbody').on('click', 'td:nth-child(1)', function() {
        var data = $('#tableTransaksi').DataTable().row(this).data();
        var namaToko = data.tr_id;
        $.ajax({
            url: '<?php echo base_url('transaksi/detail_transaksi'); ?>',
            method: 'POST',
            data: {
                tr_id: namaToko
            },
            dataType: 'json', // Menambahkan dataType untuk menentukan tipe data yang diharapkan dalam respons
            success: function(response) {
                $('#animationModal').modal('show');
                // Handle response dari controller jika diperlukan
                // $("#transaksi_id").val(response.tr_id);
                var tr_id_value = response.tr_id;
                var date = new Date(response.tanggal);
                var formattedDate = formatDate(date);
                var mitra = document.getElementById("tr_mitra");
                var idpelanggan = document.getElementById("tr_idplgn");
                var provider = document.getElementById("tr_provider");
                var kd_produk = document.getElementById("tr_kd_produk");
                var kd_produk1 = document.getElementById("tr_kd_produk1");
                var jns_transaksi = document.getElementById("tr_nominal");
                var produk = document.getElementById("tr_produk");
                var no_hp = document.getElementById("tr_no_hp");
                var harga = document.getElementById("tr_harga");
                var harga1 = document.getElementById("tr_harga1");
                var harga_jual = document.getElementById("tr_harga_jual");
                var harga_jual1 = document.getElementById("tr_harga_jual1");
                var harga_reseller = document.getElementById('tr_harga_jual_reseller');
                var sn = document.getElementById("tr_sn");
                document.getElementById("tr_id").innerText = response.tr_id;
                document.getElementById("tr_tgl").innerText = formattedDate;
                if (response.status == 'CL' || response.status == 'RF') {
                    if(response.status == 'CL') {
                        document.getElementById("tr_status").innerText = 'CLOSE';
                    } else {
                        document.getElementById("tr_status").innerText = 'REFUND';
                    }
                    document.getElementById("tr_status").classList.add("badge", "bg-label-danger");
                } else if (response.status == 'WP') {
                    document.getElementById("tr_status").innerText = 'PENDING';
                    document.getElementById("tr_status").classList.add("badge", "bg-label-warning");
                } else if (response.status == 'OK') {
                    document.getElementById("tr_status").innerText = 'SUCCESS';
                    document.getElementById("tr_status").classList.add("badge", "bg-label-success");
                } else if(response.status == 'IP') {
                    document.getElementById("tr_status").innerText = 'PROCESS';
                    document.getElementById("tr_status").classList.add('badge', 'bg-label-info');
                }else {
                    document.getElementById("tr_status").innerText = response.status;
                    document.getElementById("tr_status").classList.add('badge', 'bg-label-secondary');
                }
                mitra.innerHTML = response.us_nama;
                idpelanggan.innerHTML = response.id_plgn;
                provider.innerHTML = response.provider;
                kd_produk.innerHTML = response.vo_kode;
                kd_produk1.innerHTML = response.vo_kode;
                jns_transaksi.innerHTML = response.nominal
                produk.innerHTML = response.produk;
                no_hp.innerHTML = response.no_hp;
                harga.innerHTML = formatCurrency(response.harga);
                harga1.innerHTML = response.harga;
                sn.innerHTML = response.sn;
                harga_jual.innerHTML = formatCurrency(response.harga_jual);
                harga_jual1.innerHTML = response.harga_jual;
                harga_reseller.innerHTML = response.harga_reseller;
                // Toggle visibility and change eye icon

                // $("#eyeIcon").click(function() {
                //     var isVisible = ($("#tr_harga").attr("data-visible") === "true");
                //     if (isVisible) {
                //         var panjang = response.harga.length;
                //         if (panjang == 0 || panjang == null || panjang == undefined || panjang == '') {
                //             panjang = 1;
                //         } else {
                //             panjang = panjang;
                //         }
                //         $("#tr_harga").text("*".repeat(panjang)).attr("data-visible", "false");
                //         $("#eyeIcon").removeClass("fa-eye").addClass("fa-eye-slash");
                //     } else {
                //         $("#tr_harga").text(formatCurrency(response.harga)).attr("data-visible", "true");
                //         $("#eyeIcon").removeClass("fa-eye-slash").addClass("fa-eye");
                //     }
                // });
            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi
            }
        });
    });

    $("#eyeIcon").click(function() {
        var harga = $("#tr_harga1").text();
        var isVisible = ($("#tr_harga").attr("data-visible") === "true");
        if (isVisible) {
            var panjang = harga.length;
            if (panjang == 0 || panjang == null || panjang == undefined || panjang == '') {
                panjang = 1;
            } else {
                panjang = panjang;
            }
            $("#tr_harga").text("*".repeat(panjang)).attr("data-visible", "false");
            $("#eyeIcon").removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $("#tr_harga").text(formatCurrency(harga)).attr("data-visible", "true");
            $("#eyeIcon").removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    $("#eyeIcon1").click(function() {
        var harga = $("#tr_harga_jual1").text();
        var isVisible = ($("#tr_harga_jual").attr("data-visible") === "true");
        if (isVisible) {
            var panjang = harga.length;
            if (panjang == 0 || panjang == null || panjang == undefined || panjang == '') {
                panjang = 1;
            } else {
                panjang = panjang;
            }
            $("#tr_harga_jual").text("*".repeat(panjang)).attr("data-visible", "false");
            $("#eyeIcon1").removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $("#tr_harga_jual").text(formatCurrency(harga)).attr("data-visible", "true");
            $("#eyeIcon1").removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    $("#eyeIcon2").click(function() {
        var harga = $("#tr_kd_produk1").text();
        var isVisible = ($("#tr_kd_produk").attr("data-visible") === "true");
        if (isVisible) {
            var panjang = harga.length;
            if (panjang == 0 || panjang == null || panjang == undefined || panjang == '') {
                panjang = 1;
            } else {
                panjang = panjang;
            }
            $("#tr_kd_produk").text("*".repeat(panjang)).attr("data-visible", "false");
            $("#eyeIcon2").removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $("#tr_kd_produk").text(harga).attr("data-visible", "true");
            $("#eyeIcon2").removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });


    $('#btnReload').click(function() {
        if (autoReload === false) {
            alert('Auto Update Aktif Tiap 15 Detik');
            autoReload = true;
            autoReloadDataTables();
        } else {
            alert('Auto Update Non Aktif');
            clearInterval(intervalID); // Hentikan interval jika autoreload tidak aktif
            autoReload = false;
        }
    });

    function autoReloadDataTables() {
        intervalID = setInterval(function() {
            reload(); // Memuat ulang data tanpa mengubah halaman
        }, 15000); // Interval waktu dalam milidetik (15000 ms = 15 detik)
    }

    // autoReloadDataTables();

    function reload() {
        if ($.fn.DataTable.isDataTable('#tableTransaksi')) {
            $('#tableTransaksi').DataTable().destroy();
        }

        $('#tableTransaksi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('transaksi/getHistory'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = $('#select2Basic').val();
                    d.tgl_1 = $('#html5-date-input2').val();
                    d.tgl_2 = $('#html5-date-input3').val();
                    d.no_id = $('#basic-icon-default-fullname').val();
                    d.status = $('#select2Basic1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tanggal",
                    render: function(data, type, row) {
                        // Ubah format tanggal dari "yyyy-mm-dd HH:MM:SS" menjadi "dd/mm/yyyy H:i"
                        var dateObj = new Date(data);
                        var day = dateObj.getDate();
                        var month = dateObj.getMonth() + 1;
                        var year = dateObj.getFullYear();
                        var hours = dateObj.getHours();
                        var minutes = dateObj.getMinutes();
                        var seconds = dateObj.getSeconds(); // Tambahkan variabel untuk detik

                        // Tambahkan leading zero jika diperlukan
                        if (day < 10) {
                            day = '0' + day;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }
                        if (hours < 10) {
                            hours = '0' + hours;
                        }
                        if (minutes < 10) {
                            minutes = '0' + minutes;
                        }
                        if (seconds < 10) { // Tambahkan leading zero untuk detik
                            seconds = '0' + seconds;
                        }

                        var formattedDate = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes + ':' + seconds; // Tambahkan detik ke dalam format
                        return formattedDate;
                    },
                    className: "clickable"
                }, {
                    data: 'provider'
                }, {
                    data: 'nominal'
                }, {
                    data: 'no_hp'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "harga_jual",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "income",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + getTextStatus(data).toUpperCase() + '</span>';
                    }
                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            columnDefs: [{
                    type: "date",
                    targets: 0
                } // Menggunakan tipe data "date" untuk kolom pertama
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'History Transaksi',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });


    }



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
            case 'CL':
                return 'bg-label-danger'; // Warning
            case 'OK':
                return 'bg-label-success'; // Success
            case 'WP':
                return 'bg-label-warning'; // Danger
            case 'RF':
                return 'bg-label-danger'; // Danger
            case 'IP':
                return 'bg-label-info'; // Danger
            default:
                return ''; // Default style
        }
    }

    function getTextStatus(status) {
        switch (status) {
            case 'CL':
                return 'close'; // Warning
            case 'OK':
                return 'success'; // Success
            case 'WP':
                return 'pending'; // Danger
            case 'RF':
                return 'refund'; // Danger
            case 'IP':
                return 'process'; // Danger
            default:
                return ''; // Default style
        }
    }

    function formatDate(date) {
        var day = ("0" + date.getDate()).slice(-2); // Tambahkan awalan "0" jika perlu
        var month = ("0" + (date.getMonth() + 1)).slice(-2); // Tambahkan awalan "0" jika perlu
        var year = date.getFullYear();
        var hours = ("0" + date.getHours()).slice(-2); // Tambahkan awalan "0" jika perlu
        var minutes = ("0" + date.getMinutes()).slice(-2); // Tambahkan awalan "0" jika perlu
        var seconds = ("0" + date.getSeconds()).slice(-2); // Tambahkan awalan "0" jika perlu

        // Menggunakan string interpolation untuk memastikan bahwa nilai tunggal kurang dari 10 memiliki awalan "0"
        return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
    }

    $('#btnExport').on('click', function() {
        $('#tableTransaksi').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnReset').on('click', function() {
        $('#html5-date-input2').val(null);
        $('#html5-date-input3').val(null);
        $('#basic-icon-default-fullname').val(null);
        $('#select2Basic').val(null).trigger('change');
        $('#select2Basic1').val(null).trigger('change');
        reload();
    });
</script>

<script>
    $('#btnPrint').on('click', function() {
        var id = document.getElementById('tr_id').innerText;
        // var new_size = '';
        var url = '<?php echo site_url("transaksi/print_struk/"); ?>' + id; // Menambahkan id dan nilai sebagai parameter
        window.open(url, '_blank');
        // alert(url);
    });

    $('#btnEditHarga').on('click', function() {
        $('#modalHarga').modal('show');
        var old_harga = document.getElementById('tr_harga').innerText;
        var kode = document.getElementById('tr_kd_produk1').innerText;
        var produk = document.getElementById('tr_produk').innerText;
        var old_harga = document.getElementById('tr_harga_jual').innerText;
        var harga = old_harga.split('RP').join(''); // Menghapus koma dari string
        var harga_reseller = document.getElementById('tr_harga_jual_reseller').innerText;
        $('#kode_produk').val(kode);
        $('#nama_produk').val(produk);
        $('#hrg_jual_lama').val(harga);

        var dengan_rupiah1 = document.getElementById('hrg_jual');
        dengan_rupiah1.value = formatRupiah(harga, 'Rp. ');
        $('#hrg_jual1').val(formatRupiah(harga, 'Rp. '));
        $('#hrg_jual_reseller').val(formatRupiah(harga_reseller, 'Rp. '));

        dengan_rupiah1.addEventListener('keyup', function(e) {
            dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
        });
    });

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
        var harga_lama = $('#hrg_jual1').val();
        var harga_reseller = $('#hrg_jual_reseller').val();
        var harga1 = harga.split('.').join(''); // Menghapus koma dari string
        var harga2 = harga_lama.split('.').join(''); // Menghapus koma dari string
        var harga3 = harga_reseller.split('.').join(''); // Menghapus koma dari string

        if (harga3 === null || harga3 === '' || harga3 === undefined) {
            harga3 = 0;
        } else {
            harga3 = harga3;
        }

        if (kode === null || kode === undefined || kode === '') {
            alert('Kode Produk Tidak Boleh Kosong');
        } else if (harga === null || harga === undefined || harga === '') {
            alert('Harga Jual Wajib Diisi');
        } else if (parseInt(harga1) < parseInt(harga3)) {
            alert('Harga Baru Tidak Boleh Lebih Kecil Dari Harga Reseller');
        } else if (parseInt(harga1) < parseInt(harga2)) {
            alert('Harga Baru Tidak Boleh Lebih Kecil Dari Harga Lama');
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
                        $('#hrg_jual').val(null)
                        $('#modalHarga').modal('hide');
                        $('#animationModal').modal('hide');
                        alert(data.messages);
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
</script>

<script>
</script>