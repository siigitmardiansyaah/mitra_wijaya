<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / <a href="<?php echo base_url() ?>transaksi">Transaksi</a> /</span> Detail Transaksi
    </h4>
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-12">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="https://mitrawijaya.com/assets/logo.png" alt="">
                                </span>
                            </div>
                            <span class="app-brand-text demo text-body fw-bold" style="text-transform: uppercase;">MITRA WIPAY</span>

                        </div>
                        <div>
                            <h4>Transaksi ID #<?php echo $data->tr_id ?></h4>
                            <div class="mb-2">
                                <span class="me-1">Tanggal Transaksi:</span>
                                <span class="fw-medium"><?php echo date('d/m/Y H:i', strtotime($data->tanggal)) ?></span>
                            </div>
                            <div>
                                <span class="me-1">Status:</span>
                                <?php if ($data->status == 'sukses' || $data->status == 'paid') : ?>
                                    <span class="fw-medium badge bg-label-success"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'pending') : ?>
                                    <span class="fw-medium badge bg-label-warning"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'close') : ?>
                                    <span class="fw-medium badge bg-label-danger"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'refund') : ?>
                                    <span class="fw-medium badge bg-label-danger"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'gagal') : ?>
                                    <span class="fw-medium badge bg-label-danger"><?php echo $data->status ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="pb-2">ID Pelanggan</h6>
                            <p class="mb-1" style="font-weight: bold;"><?php echo $data->id_plgn ?></p>
                            <p class="mb-1">No Tujuan</p>
                            <p class="mb-1" style="font-weight: bold;"><?php echo $data->no_hp ?></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border-top m-0">
                        <thead>
                            <tr>
                                <th>Jenis Transaksi</th>
                                <th>Provider</th>
                                <th>Produk</th>
                                <th>Harga Beli</th>
                                <th>SN / RF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-nowrap"><?php echo $data->nominal ?></td>
                                <td class="text-nowrap"><?php echo $data->provider ?></td>
                                <td><?php echo $data->produk ?></td>
                                <td><?php echo rupiah_format($data->harga) ?></td>
                                <td><?php echo $data->sn ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" value="<?php echo $data->tr_id ?>" id="tr_id">
                        <div class="input-group input-group-merge">
                            <div class="demo-inline-spacing">
                                <button type="button" class="btn btn-outline-primary" id="btnPrint">
                                    <span class="tf-icons bx bx-printer me-1"></span>Cetak Struk
                                </button>
                                <a href="<?php echo base_url() ?>transaksi" class="btn btn-outline-info" id="btnBack">
                                    <span class="tf-icons bx bx-arrow-back me-1"></span>Kembali
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- /Invoice -->
    </div>
</div>
</div>

<!-- Modal -->

<!-- / Content -->