<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 350px;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 15px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .content {
            margin-bottom: 10px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content th,
        .content td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px dotted #000;
            word-wrap: break-word;
            /* Tambahkan properti word-wrap di sini */
        }

        .footer {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>Struk Pembelian <?php echo $data->produk ?></h3>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Transaksi ID</th>
                    <td><?php echo $data->tr_id ?></td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td><?php echo date('d/m/Y H:i', strtotime($data->tanggal)) ?></td>
                </tr>
                <tr>
                    <th>Mitra</th>
                    <td><?php echo $data->us_nama ?></td>
                </tr>
                <tr>
                    <th>ID Pelanggan</th>
                    <td><?php echo $data->id_plgn ?></td>
                </tr>
                <tr>
                    <th>No Tujuan</th>
                    <td><?php echo $data->no_hp ?></td>
                </tr>
                <tr>
                    <th>Provider</th>
                    <td><?php echo $data->provider ?></td>
                </tr>
                <tr>
                    <th>Jenis Transaksi</th>
                    <td><?php echo $data->nominal ?></td>
                </tr>
                <tr>
                    <th>Kode Produk</th>
                    <td><?php echo $data->vo_kode ?></td>
                </tr>
                <tr>
                    <th>Produk</th>
                    <td><?php echo $data->produk ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><?php echo rupiah_format($data->harga) ?></td>
                </tr>
                <tr>
                    <th>Terbilang</th>
                    <td><?php echo terbilang($data->harga, true) ?></td>
                </tr>
                <tr>
                    <th>Serial Number</th>
                    <td><?php echo $data->sn ?></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Informasi Hubungi Call Center</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        window.print();
        window.onbeforeprint = function() {
        };

        // Mendaftarkan event handler untuk event onafterprint
        window.onafterprint = function() {
            window.close();
        };
    </script>
</body>

</html>