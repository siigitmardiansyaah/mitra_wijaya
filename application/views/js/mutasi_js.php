<script>
    $(document).ready(function() {
        $('#tableSaldoMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('mutasi/getMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl1 = $('#html5-date-input11').val();
                    d.tgl2 = $('#html5-date-input22').val();
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
                    }
                },
                {
                    data: 'keterangan'
                },
                {
                    data: "debet",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "kredit",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "saldo_akhir",
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
                filename: 'Mutasi Saldo',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });
    $('#btnSubmit').click(function() {
        if ($.fn.DataTable.isDataTable('#tableSaldoMutasi')) {
            $('#tableSaldoMutasi').DataTable().destroy();
        }

        $('#tableSaldoMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('mutasi/getMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl1 = $('#html5-date-input11').val();
                    d.tgl2 = $('#html5-date-input22').val();
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

                        var formattedDate = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes;
                        return formattedDate;
                    },
                },
                {
                    data: 'keterangan'
                },
                {
                    data: "debet",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "kredit",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "saldo_akhir",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }
            ],
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'Mutasi Saldo',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });

    });

    function reload() {

        if ($.fn.DataTable.isDataTable('#tableSaldoMutasi')) {
            $('#tableSaldoMutasi').DataTable().destroy();
        }
        
        $('#tableSaldoMutasi').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('mutasi/getMutasi'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl1 = $('#html5-date-input11').val();
                    d.tgl2 = $('#html5-date-input22').val();
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
                    }
                },
                {
                    data: 'keterangan'
                },
                {
                    data: "debet",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "kredit",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                },
                {
                    data: "saldo_akhir",
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
                filename: 'Mutasi Saldo',
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

    $('#btnExport').on('click', function() {
        $('#tableSaldoMutasi').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnReset').on('click', function() {
        $('#html5-date-input11').val(null);
        $('#html5-date-input22').val(null);
        reload();
    });
</script>