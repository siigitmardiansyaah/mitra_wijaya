<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Dana /</span> Tarik Dana
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Withdraw</h5>
                </div>
                
                <div class="card-body">
                    <p class="text-muted float-left">Pencairan sebelum jam 12 akan di proses hari yang sama, jika lebih dari jam 12 maka akan diproses hari berikutnya.</p>
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
                    <form action="<?php echo base_url() ?>dana/withdraw_money" method="POST">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Bank</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bxs-bank"></i></span>
                                        <input type="text" name="nama_bank" class="form-control" id="basic-icon-default-fullname" value="<?php echo $data->bank_name ?>" placeholder="Nama Bank" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor Rekening</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card"></i></span>
                                        <input type="text" name="no_rek" class="form-control" id="basic-icon-default-fullname" value="<?php echo $data->nomor_rekening ?>" placeholder="Nomor Rekening" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Rekening</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" name="nama_rek" class="form-control" value="<?php echo $data->nama_rekening ?>" id="basic-icon-default-fullname" placeholder="Nama Rekening" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Total Saldo</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="number" name="total_saldo" class="form-control" id="basic-icon-default-fullname"  value="<?php echo $data->saldo_aktif ?>" placeholder="Total Saldo" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-wallet"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Fee</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="number" name="fee_dana" class="form-control" id="basic-icon-default-fullname" placeholder="Fee" value="<?php echo $data->fee ?>" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-calculator"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nominal Withdraw</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname1" placeholder="Nominal Penarikan" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-money-withdraw"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="submit" class="btn btn-outline-primary">
                                                <span class="tf-icons bx bx-money-withdraw me-1"></span>Withdraw
                                            </button>
                                            <!-- <button type="button" class="btn btn-outline-secondary">
                                                <span class="tf-icons bx bx-bell me-1"></span>Secondary
                                            </button> -->
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- / Content -->