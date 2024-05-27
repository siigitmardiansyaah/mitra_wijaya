<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Integrasi /</span> Transaksi via IP
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Transaksi via IP</h5>
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
                                <h6 class="alert-heading d-flex align-items-center mb-1">Success Update</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url() ?>integrasi/proses_ipaddress" method="POST">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">User ID</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" name="user_id" class="form-control" value="<?php echo $data->h2h_user_id ?>" id="basic-icon-default-fullname2" placeholder="User ID" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname" style="font-weight: bold;">URL Callback</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-code-curly"></i></span>
                                        <input type="text" name="url_callback" class="form-control" id="basic-icon-default-fullname2" value="<?php echo $data->h2h_report_url ?>" placeholder="URL Callback" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                                <div class="form-group col-md-12 form-password-toggle">
                                    <label class="form-label" for="newPassword">PIN</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="newPassword" name="pin" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="<?php echo $data->h2h_pin ?>" maxlength="4" minlength="1" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Allow IP</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-list-check"></i></span>
                                        <input type="text" id="delimiter-mask" class="form-control" value="<?php echo $data->h2h_allow_ip ?>" placeholder="IP Address" name="ip_address" />
                                    </div>
                                    <span>Gunakan koma (,) bila lebih 1 IP, contoh 192.168.0.1,192.168.0.2</span>
                                </div>
                                <div class="mb-3 col-md-12 col-sm-4 form-password-toggle">
                                    <label class="form-label" for="newPassword">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="newPassword" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="newPassword">Status</label>
                                    <span class="badge bg-label-success me-2 ms-2">Aktif</span>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Selesai</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" name="tgl_permohonan22" id="html5-date-input22"/>
                                    </div>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="submit" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-save me-1"></span>Update
                                            </button>
                                        </div>
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