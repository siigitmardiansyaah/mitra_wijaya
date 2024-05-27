<script>
    $(document).ready(function() {
        $('#tableMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan1 = $('#html5-date-input1').val();
                    d.tgl_permohonan2 = $('#html5-date-input2').val();
                    d.tgl_pembayaran1 = $('#html5-date-input3').val();
                    d.tgl_pembayaran2 = $('#html5-date-input4').val();
                    d.dana_tarikan = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname9').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tgl_permohonan",
                },
                {
                    data: "tgl_pembayaran",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },

                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                },
                {
                    data: "keterangan"
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
                filename: 'Mutasi Dana',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    $('#btnSubmit').click(function() {
        if ($.fn.DataTable.isDataTable('#tableMutasi')) {
            $('#tableMutasi').DataTable().destroy();
        }

        $('#tableMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan1 = $('#html5-date-input1').val();
                    d.tgl_permohonan2 = $('#html5-date-input2').val();
                    d.tgl_pembayaran1 = $('#html5-date-input3').val();
                    d.tgl_pembayaran2 = $('#html5-date-input4').val();
                    d.dana_tarikan = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname9').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tgl_permohonan",
                },
                {
                    data: "tgl_pembayaran",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },

                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                },
                {
                    data: "keterangan"
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
                filename: 'Mutasi Dana',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    $('#btnExport').on('click', function() {
        $('#tableMutasi').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnResetMD').on('click', function() {
        $('#html5-date-input1').val(null);
        $('#html5-date-input2').val(null);
        $('#html5-date-input3').val(null);
        $('#html5-date-input4').val(null);
        $('#basic-icon-default-fullname1').val(null);
        $('#basic-icon-default-fullname9').val(null);
        reloadMD();
    });

    function reloadMD() {
        if ($.fn.DataTable.isDataTable('#tableMutasi')) {
            $('#tableMutasi').DataTable().destroy();
        }

        $('#tableMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan1 = $('#html5-date-input1').val();
                    d.tgl_permohonan2 = $('#html5-date-input2').val();
                    d.tgl_pembayaran1 = $('#html5-date-input3').val();
                    d.tgl_pembayaran2 = $('#html5-date-input4').val();
                    d.dana_tarikan = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname9').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tgl_permohonan",
                },
                {
                    data: "tgl_pembayaran",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },

                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                },
                {
                    data: "keterangan"
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
                filename: 'Mutasi Dana',
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
            case 'pending':
                return 'bg-label-warning'; // Warning
            case 'sukses':
                return 'bg-label-success'; // Success
            case 'cancel':
                return 'bg-label-danger'; // Danger
            case 'refund':
                return 'bg-label-danger'; // Danger
            default:
                return ''; // Default style
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#tableMutasi1').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasiSettlement'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan11 = $('#html5-date-input11').val();
                    d.tgl_permohonan22 = $('#html5-date-input22').val();
                    d.tgl_pembayaran33 = $('#html5-date-input33').val();
                    d.tgl_pembayaran44 = $('#html5-date-input44').val();
                    d.dana_tarikan1 = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "periode_transaksi",
                },
                {
                    data: "proses_settlement",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
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
                filename: 'Mutasi Settlement',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    $('#btnSubmit1').click(function() {
        if ($.fn.DataTable.isDataTable('#tableMutasi1')) {
            $('#tableMutasi1').DataTable().destroy();
        }

        $('#tableMutasi1').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasiSettlement'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan11 = $('#html5-date-input11').val();
                    d.tgl_permohonan22 = $('#html5-date-input22').val();
                    d.tgl_pembayaran33 = $('#html5-date-input33').val();
                    d.tgl_pembayaran44 = $('#html5-date-input44').val();
                    d.dana_tarikan1 = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "periode_transaksi",
                },
                {
                    data: "proses_settlement",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
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
                filename: 'Mutasi Settlement',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
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
                case 'pending':
                    return 'bg-label-warning'; // Warning
                case 'sukses':
                    return 'bg-label-success'; // Success
                case 'cancel':
                    return 'bg-label-danger'; // Danger
                default:
                    return ''; // Default style
            }
        }
    });

    $('#btnExport1').on('click', function() {
        $('#tableMutasi1').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnResetMS').on('click', function() {
        $('#html5-date-input11').val(null);
        $('#html5-date-input22').val(null);
        $('#html5-date-input33').val(null);
        $('#html5-date-input44').val(null);
        $('#basic-icon-default-fullname1').val(null);

        reloadMS();
    });


    function reloadMS() {
        if ($.fn.DataTable.isDataTable('#tableMutasi1')) {
            $('#tableMutasi1').DataTable().destroy();
        }

        $('#tableMutasi1').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('dana/getDanaMutasiSettlement'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_permohonan11 = $('#html5-date-input11').val();
                    d.tgl_permohonan22 = $('#html5-date-input22').val();
                    d.tgl_pembayaran33 = $('#html5-date-input33').val();
                    d.tgl_pembayaran44 = $('#html5-date-input44').val();
                    d.dana_tarikan1 = $('#basic-icon-default-fullname1').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "periode_transaksi",
                },
                {
                    data: "proses_settlement",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data === null || data === "01/01/1970 07:00") {
                            return "";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: "nominal",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
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
                filename: 'Mutasi Settlement',
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
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('basic-icon-default-fullname1');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
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
</script>