<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Setting /</span> Setting Rekening
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Setting Rekening</h5>
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
                                <h6 class="alert-heading d-flex align-items-center mb-1">Sukses Update</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url() ?>setting/proses_rekening" method="POST" id="formRekening">
                        <div class="col-md-12">
                            <div class="row">
                                <?php if (empty($data->nomor_rekening)) : ?>
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Nomor Rekening</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="number" name="no_rek" class="form-control" id="basic-icon-default-fullname" placeholder="Nomor Rekening" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Nama Rekening</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" name="nm_rek" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Rekening" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="selectpickerBasic" class="form-label">Bank</label>
                                        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank">
                                            <option value="">Pilih Bank</option>
                                            <?php foreach ($data1 as $key => $value) : ?>
                                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group input-group-merge">
                                            <div class="demo-inline-spacing">
                                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#animationModal">
                                                    <span class="tf-icons bx bx-save me-1"></span>Save
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
                                <?php else : ?>
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Nomor Rekening</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card"></i></span>
                                            <input type="text" name="no_rek" class="form-control" id="basic-icon-default-fullname" placeholder="Nomor Rekening" value="<?php echo $data->nomor_rekening ?>" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Nama Rekening</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" name="nm_rek" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Rekening" value="<?php echo $data->nama_rekening ?>" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="selectpickerBasic" class="form-label">Bank</label>
                                        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="id_bank" disabled>
                                            <option value="">Pilih Bank</option>
                                            <?php foreach ($data1 as $key => $value) : ?>
                                                <option <?php if ($data->bank_rekening == $key) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $key ?>"><?php echo $value ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group input-group-merge">
                                            <div class="demo-inline-spacing">
                                                <button type="button" class="btn btn-outline-info">
                                                    <span class="tf-icons bx bx-save me-1"></span>Save
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade animate__animated fadeIn" id="animationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel5">Konfirmasi Rekening</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="text-justify" style="font-weight: bold;">DATA REKENING HANYA BISA SATUKALI SIMPAN. JIKA ADA KESALAHAN HARAP HUBUNGIN ADMIN UNTUK PERBAIKAN</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="formRekening">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- / Content -->