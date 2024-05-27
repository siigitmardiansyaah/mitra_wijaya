<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Harga /</span> Daftar Harga
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Daftar Harga</h5>
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
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Produk</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" required>
                                        <option value="">Pilih Produk</option>
                                        <?php foreach ($data as $key) : ?>
                                            <option value="<?php echo $key->op_produk ?>"><?php echo $key->op_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Keterangan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname" placeholder="Keterangan" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-note"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kode</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname1" placeholder="Kode" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-barcode"></i></span>
                                    </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <hr class="mt-0">
                    <br/>
                    <h4 style="text-transform: uppercase;font-weight: bold;">List Harga Produk</h4>
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableHarga">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- / Content -->