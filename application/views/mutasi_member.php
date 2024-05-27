<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Member /</span> Mutasi
        Member
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Mutasi Member</h5>
                </div>

                <div class="card-body">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-warning d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Terjadi Kesalahan</h6>
                                <span>
                                    <?php echo $this->session->flashdata('error') ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Success Withdraw</h6>
                                <span>
                                    <?php echo $this->session->flashdata('success') ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">NMID</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nmid" class="form-control" id="basic-icon-default-fullname5" placeholder="NMID" aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-card-id"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Toko</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Toko" aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Transaksi
                                        (Dari)</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_pembayaran1" id="html5-date-input1" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Transaksi
                                        (Sampai)</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_pembayaran1" id="html5-date-input2" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Jumlah
                                        Mutasi</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname1" placeholder="Jumlah Mutasi" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-money"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Keterangan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname2" placeholder="Keterangan" aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-note"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kredit</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname3" placeholder="Jumlah Kredit" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-money"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Debet</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">Rp. </span>
                                        <input type="text" name="dana_tarikan" class="form-control" id="basic-icon-default-fullname4" placeholder="Jumlah Debet" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-money"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-primary" id="btnSubmit2">
                                                <span class="tf-icons bx bx-search me-1"></span>Tampilkan
                                            </button>
                                            <button type="button" class="btn btn-outline-warning" id="btnResetMM">
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
                        <table class="dt-advanced-search table border-top table" id="tableMutasiMember" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Resend Callback</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>NMID</th>
                                    <th>TID</th>
                                    <th>TransactionID</th>
                                    <th>Transaction Code</th>
                                    <th>Payment Status</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Jumlah</th>
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
<div class="modal fade animate__animated bounceInUp" id="animationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel5">Resend Callback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col mb-12">
                            <label for="nameAnimation" class="form-label">Tanggal Callback</label>
                            <input type="datetime" id="tgl_callback" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-12">
                            <label for="emailAnimation" class="form-label">URL Callback</label>
                            <input type="text" id="url_callback" class="form-control" placeholder="Url Callback" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-12">
                            <label for="emailAnimation" class="form-label">Response Callback</label>
                            <input type="hidden" id="idmutasi" class="form-control">
                            <textarea name="response_url" id="response_url" cols="30" rows="10" class="form-control" readonly placeholder="Response Callback"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="demo-inline-spacing">
                    <button type="button" class="btn rounded-pill btn-outline-secondary" data-bs-dismiss="modal">
                        <span class="tf-icons bx bx-window-close me-1"></span>Close
                    </button>
                    <button type="button" class="btn rounded-pill btn-outline-primary" id="btnResend">
                        <span class="tf-icons bx bx-send me-1"></span>Resend
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- / Content -->