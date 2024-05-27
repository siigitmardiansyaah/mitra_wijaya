<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / </span> History Transaksi
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">History Transaksi</h5>
                </div>

                <div class="card-body">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-warning d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Terjadi Kesalahan</h6>
                                <span><?php echo $this->session->flashdata('error') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Success</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="selectpickerBasic" class="form-label">Produk</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" required>
                                        <option value="">Pilih Produk</option>
                                        <?php foreach ($produk as $key) : ?>
                                            <option value="<?php echo $key->op_produk ?>"><?php echo $key->op_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Mulai</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_permohonan2" id="html5-date-input2" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Selesai</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_pembayaran1" id="html5-date-input3" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor / ID</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname" placeholder="Nomor / ID" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-id-card"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="selectpickerBasic" class="form-label">Status</label>
                                    <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" required>
                                        <option value="">Pilih Status</option>
                                        <option value="sukses">Sukses</option>
                                        <option value="pending">Pending</option>
                                        <option value="gagal">Gagal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-search me-1"></span>Filter
                                            </button>
                                            <button type="button" class="btn btn-outline-warning" id="btnReset">
                                                <span class="tf-icons bx bx-reset me-1"></span>Reset
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="btnExport">
                                                <span class="tf-icons bx bx-download me-1"></span>Download
                                            </button>
                                            <button type="button" class="btn btn-outline-info" id="btnReload">
                                                <span class="tf-icons bx bx-loader-alt me-1"></span>Auto Update Table
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br />
                    <hr class="mt-0">
                    <br />
                    <h4 style="text-transform: uppercase;font-weight: bold;">List History Transaksi</h4>
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableTransaksi">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Provider</th>
                                    <th>Voucher</th>
                                    <th>No Tujuan</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Laba</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade animate__animated shakeX" id="animationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="margin-top: -50px;">
                    <div class="card g-3 mt-5">
                        <div class="card-body row g-3">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                                    <div>
                                        <h4>Transaksi #<span id="tr_id" style="font-weight: bold;"></span></h4>
                                        <div class="mb-2">
                                            <span class="me-1">Tanggal Transaksi:</span>
                                            <span class="fw-medium" id="tr_tgl"></span>
                                        </div>
                                        <div>
                                            <span class="me-1">Status:</span>
                                            <span id="tr_status"></span>
                                        </div>
                                    </div>
                                    <div class="mb-xl-0 mb-4">
                                        <div class="d-flex svg-illustration mb-3 gap-2">
                                            <span class="app-brand-logo demo">
                                                <img src="<?php echo base_url() ?>assets/assets/img/order.png" alt="">
                                            </span>
                                        </div>
                                        <!-- <span class="app-brand-text demo text-body fw-bold" style="text-transform: uppercase;" id="tr_mitra"></span> -->

                                    </div>
                                </div>

                                <div class="card academy-content shadow-none border">
                                    <div class="card-body">
                                        <form>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Mitra</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_mitra" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">ID Pelanggan</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_idplgn" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Provider</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_provider" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Jenis Transaksi</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_nominal" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Kode Produk</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="toggleVisibility2" style="position: relative;cursor: pointer;" >
                                                                <span id="tr_kd_produk" class="col-form-label" data-visible="true"></span>
                                                                <span id="tr_kd_produk1" class="col-form-label" style="display: none;"></span>
                                                                <i id="eyeIcon2" class="fa fa-eye" aria-hidden="true" style="position: absolute; left: calc(100% + 10px); top: 50%; transform: translateY(-50%);"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Produk</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_produk" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">No Telepon</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_no_hp" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Harga Beli</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="toggleVisibility" style="position: relative; cursor: pointer;" >
                                                                <span id="tr_harga" class="col-form-label" data-visible="true"></span>
                                                                <span id="tr_harga1" class="col-form-label" style="display: none;"></span>
                                                                <i id="eyeIcon" class="fa fa-eye" aria-hidden="true" style="position: absolute; left: calc(100% + 10px); top: 50%; transform: translateY(-50%);"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Harga Jual</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="toggleVisibility1" style="position: relative; cursor:pointer;" >
                                                                <span id="tr_harga_jual" class="col-form-label" data-visible="true"></span>
                                                                <span id="tr_harga_jual1" class="col-form-label" style="display: none;"></span>
                                                                <i id="eyeIcon1" class="fa fa-eye" aria-hidden="true" style="position: absolute; left: calc(100% + 10px); top: 50%; transform: translateY(-50%);"></i>
                                                            </span>
                                                            <span id="tr_harga_jual_reseller" style="display: none;" class="col-form-label"></span>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="margin-bottom: 10px;">
                                                        <label class="text-muted fw-light" for="basic-icon-default-fullname">Serial Number</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="tr_sn" class="col-form-label"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="demo-inline-spacing">
                        <button type="button" class="btn btn-outline-primary" id="btnPrint">
                            <span class="tf-icons bx bx-printer me-1"></span>Cetak Struk
                        </button>
                        <button type="button" class="btn btn-outline-info" id="btnEditHarga">
                            <span class="tf-icons bx bx-edit me-1"></span>Edit Harga
                        </button>
                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">
                            <span class="tf-icons bx bx-arrow-back me-1"></span>Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade animate__animated fadeIn" id="modalHarga" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Update Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kode Produk</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-barcode"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="kode_produk" placeholder="Kode Produk" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Produk</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-box"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="nama_produk" placeholder="Nama Produk" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Harga Jual Reseller</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-purchase-tag"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="hrg_jual_reseller" placeholder="Harga Reseller" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Harga Jual Lama</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-purchase-tag"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="hrg_jual1" placeholder="Harga Jual Lama" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Harga Jual Baru</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-purchase-tag"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="hrg_jual" placeholder="Harga Jual" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <input type="hidden" name="no_rek" class="form-control" id="hrg_jual_lama" placeholder="Harga Jual" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveHarga">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Animation -->
<!-- / Content -->