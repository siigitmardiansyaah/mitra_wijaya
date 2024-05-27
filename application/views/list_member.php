<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Member /</span> List Member
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List Member</h5>
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
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Toko</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Toko" aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-search me-1"></span>Tampilkan
                                            </button>
                                        </div>
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-warning" id="btnResetM">
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
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableMember" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Toko</th>
                                    <th>Status Pengajuan</th>
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

<!-- Modal -->

<!-- / Content -->