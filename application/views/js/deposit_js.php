<script>
    $(document).ready(function() {
        $('#tableHistory').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('deposit/getHistory'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_1 = $('#html5-date-input11').val();
                    d.tgl_2 = $('#html5-date-input22').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tanggal",
                    className: "clickable",
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
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: 'bank'
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
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
                filename: 'History Deposit',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
        $('#tableHistory tbody').on('click', 'tr', function() {
            var data = $('#tableHistory').DataTable().row(this).data();
            var namaToko = data.deposit_id;
            window.location.href = '<?php echo base_url('deposit/detail_deposit'); ?>/' + encodeURIComponent(namaToko);
        });
    });


    $('#btnSubmit').click(function() {
        if ($.fn.DataTable.isDataTable('#tableHistory')) {
            $('#tableHistory').DataTable().destroy();
        }

        $('#tableHistory').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('deposit/getHistory'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_1 = $('#html5-date-input11').val();
                    d.tgl_2 = $('#html5-date-input22').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tanggal",
                    className: "clickable",
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
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: 'bank'
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
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
                filename: 'History Deposit',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });

        $('#tableHistory tbody').on('click', 'tr', function() {
            var data = $('#tableHistory').DataTable().row(this).data();
            var namaToko = data.deposit_id;
            window.location.href = '<?php echo base_url('deposit/detail_deposit'); ?>/' + encodeURIComponent(namaToko);
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
            case 'close':
                return 'bg-label-danger'; // Warning
            case 'sukses':
                return 'bg-label-success'; // Success
            case 'pending':
                return 'bg-label-warning'; // Danger
            case 'refund':
                return 'bg-label-danger';
            default:
                return ''; // Default style
        }
    }

    function reload() {
        if ($.fn.DataTable.isDataTable('#tableHistory')) {
            $('#tableHistory').DataTable().destroy();
        }

        $('#tableHistory').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('deposit/getHistory'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.tgl_1 = $('#html5-date-input11').val();
                    d.tgl_2 = $('#html5-date-input22').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "tanggal",
                    className: "clickable",
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
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: 'bank'
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
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
                filename: 'History Deposit',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
        $('#tableHistory tbody').on('click', 'tr', function() {
            var data = $('#tableHistory').DataTable().row(this).data();
            var namaToko = data.deposit_id;
            window.location.href = '<?php echo base_url('deposit/detail_deposit'); ?>/' + encodeURIComponent(namaToko);
        });
    }

    $('#btnExport').on('click', function() {
        $('#tableHistory').DataTable().button('.buttons-excel').trigger();
    });

    $('#btnReset').on('click', function() {
        $('#html5-date-input11').val(null);
        $('#html5-date-input22').val(null);
        reload();
    });
</script>

<script>
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('basic-icon-default-fullname');
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