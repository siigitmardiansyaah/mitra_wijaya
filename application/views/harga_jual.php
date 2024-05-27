<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Harga /</span> Harga Jual
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Harga Jual</h5>
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
                                <div class="form-group col-md-6">
                                    <label for="selectpickerBasic" class="form-label">Kategori Produk</label>
                                    <select id="select2Basic5" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($produk as $key) : ?>
                                            <option value="<?php echo $key->kategori_id ?>"><?php echo $key->kategori_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectpickerBasic" class="form-label">Produk</label>
                                    <select id="select2Basic6" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" required>
                                        <option value="">Pilih Produk</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-primary" id="btnSubmitF">
                                                <span class="tf-icons bx bx-search me-1"></span>Filter
                                            </button>
                                            <button type="button" class="btn btn-outline-warning" id="btnResetF">
                                                <span class="tf-icons bx bx-reset me-1"></span>Reset
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
                    <h4 style="text-transform: uppercase;font-weight: bold;">List Produk</h4>
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableJualHarga">
                            <thead>
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Produk</th>
                                    <th>Harga Reseller</th>
                                    <th>Harga Jual</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade animate__animated fadeIn" id="modalHarga" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel5">Update Harga Jual</h5>
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
                                    <input type="text" name="no_rek" class="form-control" id="hrg_jual_reseller" placeholder="Harga Jual Reseller" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="basic-icon-default-fullname">Harga Jual Lama</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-purchase-tag"></i></span>
                                    <input type="text" name="no_rek" class="form-control" id="hrg_jual_lama" placeholder="Harga Jual Lama" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="basic-icon-default-fullname">Harga Jual Baru</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-purchase-tag"></i></span>
                                    <input type="text" name="no_rek" class="form-control" id="hrg_jual" placeholder="Harga Jual" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
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