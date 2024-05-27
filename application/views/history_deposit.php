<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Deposit /</span> History Deposit
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">History Deposit</h5>
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
                                <h6 class="alert-heading d-flex align-items-center mb-1">Success Withdraw</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Mulai</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_permohonan11" id="html5-date-input11"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Selesai</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_permohonan22" id="html5-date-input22"/>
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
                                        <!-- <div class="demo-inline-spacing">
                                            <button type="button" class="btn rounded-pill btn-outline-primary">
                                                <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Primary
                                            </button>
                                            <button type="button" class="btn rounded-pill btn-outline-secondary">
                                                <span class="tf-icons bx bx-bell me-1"></span>Secondary
                                            </button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <hr class="mt-0">
                    <br/>
                    <h4 style="text-transform: uppercase;font-weight: bold;">List History Deposit</h4>
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableHistory">
                            <thead>
                                <tr class="text-center">
                                    <th hidden>Tanggal</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Pembayaran</th>
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