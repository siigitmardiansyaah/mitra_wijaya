<script>
    $(document).ready(function() {
        $('#tableMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing,
            ajax: {
                url: '<?php echo base_url('member/getMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "nama_lengkap",
                    className: "clickable"
                },
                {
                    data: "nama_toko",
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

        $('#tableMember tbody').on('click', 'tr', function() {
            var data = $('#tableMember').DataTable().row(this).data();
            var namaToko = data.nama_toko;
            window.location.href = '<?php echo base_url('member/detail_member'); ?>/' + encodeURIComponent(namaToko);
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
                case 'active':
                    return 'bg-label-success'; // Success
                case 'cancel':
                    return 'bg-label-danger'; // Danger
                default:
                    return ''; // Default style
            }
        }
    });
    $('#btnSubmit').click(function() {
        if ($.fn.DataTable.isDataTable('#tableMember')) {
            $('#tableMember').DataTable().destroy();
        }

        $('#tableMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('member/getMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "nama_lengkap",
                    className: "clickable"
                },
                {
                    data: "nama_toko",
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

        $('#tableMember tbody').on('click', 'tr', function() {
            var data = $('#tableMember').DataTable().row(this).data();
            var namaToko = data.nama_toko;
            window.location.href = '<?php echo base_url('member/detail_member'); ?>/' + encodeURIComponent(namaToko);
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
                case 'active':
                    return 'bg-label-success'; // Success
                case 'cancel':
                    return 'bg-label-danger'; // Danger
                default:
                    return ''; // Default style
            }
        }
    });

    $('#btnResetM').click(function() {
        $('#basic-icon-default-fullname').val(null);
        reloadMember();
    });
    $('#btnExport').on('click', function() {
        $('#tableMutasi').DataTable().button('.buttons-excel').trigger();
    });

    function reloadMember() {
        if ($.fn.DataTable.isDataTable('#tableMember')) {
            $('#tableMember').DataTable().destroy();
        }

        $('#tableMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('member/getMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "nama_lengkap",
                    className: "clickable"
                },
                {
                    data: "nama_toko",
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

        $('#tableMember tbody').on('click', 'tr', function() {
            var data = $('#tableMember').DataTable().row(this).data();
            var namaToko = data.nama_toko;
            window.location.href = '<?php echo base_url('member/detail_member'); ?>/' + encodeURIComponent(namaToko);
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
                case 'active':
                    return 'bg-label-success'; // Success
                case 'cancel':
                    return 'bg-label-danger'; // Danger
                default:
                    return ''; // Default style
            }
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#tableMutasiMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('member/getMutasiMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                    d.tgl1 = $('#html5-date-input1').val();
                    d.tgl2 = $('#html5-date-input1').val();
                    d.jumlah = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname2').val();
                    d.kredit = $('#basic-icon-default-fullname3').val();
                    d.debit = $('#basic-icon-default-fullname4').val();
                    d.nmid = $('#basic-icon-default-fullname5').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: null,
                    render: function(data, type, row) {
                        var responseJSON = JSON.stringify(row.send_callback_response);

                        // Menghindari karakter khusus dalam string JSON
                        var safeResponseJSON = responseJSON.replace(/"/g, "&quot;").replace(/'/g, "&#39;");

                        return '<div class="demo-inline-spacing">' +
                            '<button type="button" id="btnModalMutasi" class="btn rounded-pill btn-outline-dark" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Resend Callback" data-tgl_send="' + row.tanggal_send_callback + '" data-url_send="' + row.url_send_callback + '" data-response_callback="' + safeResponseJSON + '" data-idmutasi="' + row.idmutasi + '">' +
                            '<span class="tf-icons bx bx-rotate-right me-1"></span></button></div>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        var renderedData = '<span style="font-weight:bold">(' + row.nama_toko + ')</span> ' + '<p>' + data.nama_lengkap + '</p>';
                        return renderedData;
                    }
                }, {
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
                }, {
                    data: "Keterangan"
                }, {
                    data: "nmid"
                }, {
                    data: "tid"
                }, {
                    data: "transaction_id"
                }, {
                    data: "transaction_code"
                }, {
                    data: "payment_status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                }, {
                    data: "payment_date",
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
                }, {
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "jumlah",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }
            ],
            order: [
                [1, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            columnDefs: [{
                    type: "date",
                    targets: 1
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
    $('#btnSubmit2').click(function() {
        if ($.fn.DataTable.isDataTable('#tableMutasiMember')) {
            $('#tableMutasiMember').DataTable().destroy();
        }

        $('#tableMutasiMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('member/getMutasiMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                    d.tgl1 = $('#html5-date-input1').val();
                    d.tgl2 = $('#html5-date-input1').val();
                    d.jumlah = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname2').val();
                    d.kredit = $('#basic-icon-default-fullname3').val();
                    d.debit = $('#basic-icon-default-fullname4').val();
                    d.nmid = $('#basic-icon-default-fullname5').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: null,
                    render: function(data, type, row) {
                        var responseJSON = JSON.stringify(row.send_callback_response);

                        // Menghindari karakter khusus dalam string JSON
                        var safeResponseJSON = responseJSON.replace(/"/g, "&quot;").replace(/'/g, "&#39;");

                        return '<div class="demo-inline-spacing">' +
                            '<button type="button" id="btnModalMutasi" class="btn rounded-pill btn-outline-dark" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Resend Callback" data-tgl_send="' + row.tanggal_send_callback + '" data-url_send="' + row.url_send_callback + '" data-response_callback="' + safeResponseJSON + '" data-idmutasi="' + row.idmutasi + '">' +
                            '<span class="tf-icons bx bx-rotate-right me-1"></span></button></div>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        var renderedData = '<span style="font-weight:bold">(' + row.nama_toko + ')</span> ' + '<p>' + data.nama_lengkap + '</p>';
                        return renderedData;
                    }
                }, {
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
                }, {
                    data: "Keterangan"
                }, {
                    data: "nmid"
                }, {
                    data: "tid"
                }, {
                    data: "transaction_id"
                }, {
                    data: "transaction_code"
                }, {
                    data: "payment_status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                }, {
                    data: "payment_date",
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
                }, {
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "jumlah",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }
            ],
            order: [
                [1, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            columnDefs: [{
                    type: "date",
                    targets: 1
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
    $('#btnResetMM').on('click', function() {
        $('#basic-icon-default-fullname').val(null);
        $('#html5-date-input1').val(null);
        $('#html5-date-input1').val(null);
        $('#basic-icon-default-fullname1').val(null);
        $('#basic-icon-default-fullname2').val(null);
        $('#basic-icon-default-fullname3').val(null);
        $('#basic-icon-default-fullname4').val(null);
        $('#basic-icon-default-fullname5').val(null);
        reloadMutasiMember();
    });

    function reloadMutasiMember() {
        if ($.fn.DataTable.isDataTable('#tableMutasiMember')) {
            $('#tableMutasiMember').DataTable().destroy();
        }

        $('#tableMutasiMember').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ordering: false, // Menonaktifkan pengurutan untuk semua kolom
            ajax: {
                url: '<?php echo base_url('member/getMutasiMember'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.nama_toko = $('#basic-icon-default-fullname').val();
                    d.tgl1 = $('#html5-date-input1').val();
                    d.tgl2 = $('#html5-date-input1').val();
                    d.jumlah = $('#basic-icon-default-fullname1').val();
                    d.keterangan = $('#basic-icon-default-fullname2').val();
                    d.kredit = $('#basic-icon-default-fullname3').val();
                    d.debit = $('#basic-icon-default-fullname4').val();
                    d.nmid = $('#basic-icon-default-fullname5').val();
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: null,
                    render: function(data, type, row) {
                        var responseJSON = JSON.stringify(row.send_callback_response);

                        // Menghindari karakter khusus dalam string JSON
                        var safeResponseJSON = responseJSON.replace(/"/g, "&quot;").replace(/'/g, "&#39;");

                        return '<div class="demo-inline-spacing">' +
                            '<button type="button" id="btnModalMutasi" class="btn rounded-pill btn-outline-dark" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Resend Callback" data-tgl_send="' + row.tanggal_send_callback + '" data-url_send="' + row.url_send_callback + '" data-response_callback="' + safeResponseJSON + '" data-idmutasi="' + row.idmutasi + '">' +
                            '<span class="tf-icons bx bx-rotate-right me-1"></span></button></div>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        var renderedData = '<span style="font-weight:bold">(' + row.nama_toko + ')</span> ' + '<p>' + data.nama_lengkap + '</p>';
                        return renderedData;
                    }
                }, {
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
                }, {
                    data: "Keterangan"
                }, {
                    data: "nmid"
                }, {
                    data: "tid"
                }, {
                    data: "transaction_id"
                }, {
                    data: "transaction_code"
                }, {
                    data: "payment_status",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return '<span class="badge ' + getStatusStyle(data) + '">' + data.toUpperCase() + '</span>';
                    }
                }, {
                    data: "payment_date",
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
                }, {
                    data: "amount",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "fee",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "jumlah",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }
            ],
            order: [
                [1, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            columnDefs: [{
                    type: "date",
                    targets: 1
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
            case 'PENDING':
                return 'bg-label-warning'; // Warning
            case 'PAID':
                return 'bg-label-success'; // Success
            case 'CANCEL':
                return 'bg-label-danger'; // Danger
            default:
                return ''; // Default style
        }
    }

    $(document).on('click', '#btnModalMutasi', function() {
        $('#tgl_callback').val($(this).data('tgl_send'))
        $('#url_callback').val($(this).data('url_send'))
        var responseJSON = JSON.stringify($(this).data('response_callback'));
        $('#response_url').val(responseJSON)
        $('#idmutasi').val($(this).data('idmutasi')) // Lakukan sesuatu dengan id yang didapatkan, misalnya buka modal
        $('#animationModal').modal('show');
        // Gunakan id di sini sesuai kebutuhan
    });

    $('#btnResend').click(function() {
        // Mendapatkan nilai dari elemen dengan id 'idmutasi'
        var idMutasi = $('#idmutasi').val();

        // Kirim data ke controller melalui AJAX
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('member/resendCallback'); ?>',
            data: {
                idmutasi: idMutasi
            }, // Mengirim nilai idMutasi sebagai parameter
            success: function(response) {
                if (response === '200') {
                    alert('Berhasil Resend Callback');
                } else {
                    alert('Gagal Resend Callback');
                }
                // Lakukan tindakan lain setelah menampilkan alert
                $('#tableMutasiMember').DataTable().clear().draw();

                // $('#tableMutasiMember').DataTable();
                $('#animationModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika terjadi
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>

<script>
    /* Dengan Rupiah */
    var dengan_rupiah1 = document.getElementById('basic-icon-default-fullname1');
    var dengan_rupiah2 = document.getElementById('basic-icon-default-fullname3');
    var dengan_rupiah3 = document.getElementById('basic-icon-default-fullname4');
    var dengan_rupiah4 = document.getElementById('basic-icon-default-fullname11');
    dengan_rupiah1.addEventListener('keyup', function(e) {
        dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });
    dengan_rupiah2.addEventListener('keyup', function(e) {
        dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
    });
    dengan_rupiah3.addEventListener('keyup', function(e) {
        dengan_rupiah3.value = formatRupiah(this.value, 'Rp. ');
    });
    dengan_rupiah4.addEventListener('keyup', function(e) {
        dengan_rupiah4.value = formatRupiah(this.value, 'Rp. ');
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
<script>
     $('#select2Basic1').change(function() {
        var country_id = $(this).val();

        // Request Ajax untuk mendapatkan kota berdasarkan negara
        $.ajax({
            url: "<?php echo base_url('member/getCity'); ?>",
            method: "POST",
            dataType: "json",
            data: {
                prov_id: country_id
            },
            success: function(data) {
                // Menghapus semua option pada select box kota
                $('#select2Basic2').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic2').append('<option value="">Pilih Kota / Kabupaten</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic2').append('<option value="' + city.city_id + '">' + city.city_name + '</option>');
                });

                // Memperbarui Select2 setelah menambahkan option baru
            }
        });
    });

    $('#select2Basic2').change(function() {
        var country_id = $(this).val();

        // Request Ajax untuk mendapatkan kota berdasarkan negara
        $.ajax({
            url: "<?php echo base_url('member/getDist'); ?>",
            method: "POST",
            dataType: "json",
            data: {
                prov_id: country_id
            },
            success: function(data) {
                // Menghapus semua option pada select box kota
                $('#select2Basic3').empty();

                // Menambahkan option kota berdasarkan hasil Ajax
                $('#select2Basic3').append('<option value="">Pilih Kecamatan</option>');
                $.each(data, function(index, city) {
                    $('#select2Basic3').append('<option value="' + city.dis_id + '">' + city.dis_name + '</option>');
                });

                // Memperbarui Select2 setelah menambahkan option baru
            }
        });
    });
</script>