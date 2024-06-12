<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / </span> Dana Customer Registrasi
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Registrasi Dana</h5>
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
                    <form action="<?php echo base_url() ?>dana_customer/regis_dana" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Depan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_depan" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Depan" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="token" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="key" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="secret" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Belakang</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_belakang" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Depan" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Merchant</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_merchant" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Merchant" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectpickerBasic" class="form-label">Jenis Usaha</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="jen_usaha" required>
                                        <option value="">Pilih Jenis Usaha</option>
                                        <option value="4814|Konter Pulsa">Konter Pulsa</option>
                                        <option value="4722|Travel">Travel</option>
                                        <option value="5411|Toko Kelontong">Toko Kelontong</option>
                                        <option value="5814|Kantin / Warung Makan">Kantin / Warung Makan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Deskripsi Merchant</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="deskripsi_merchant" class="form-control" id="basic-icon-default-fullname" placeholder="Deskripsi Merchant || Deskripsi Secara Singkat" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Logo</label>
                                    <input type="file" id="logo" class="form-control" name="logo" accept="image/png" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Preview Logo</label>
                                    <br/>
                                    <img class="img" id="avatarlogo" width="300" height="100px" />
                                    <input type="hidden" id="textArealogo" name="PC_LOGO">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Provinsi</label>
                                    <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true" name="provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $key) : ?>
                                            <option value="<?php echo $key->KycProvince ?>"><?php echo $key->KycProvince ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Kota</label>
                                    <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true" name="kota" required>
                                        <option value="">Pilih Kota</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Kecamatan</label>
                                    <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true" name="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Alamat 1</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="alamat1" class="form-control" id="basic-icon-default-fullname" placeholder="Alamat 1" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-home"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Alamat 2</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="alamat2" class="form-control" id="basic-icon-default-fullname" placeholder="Alamat 2" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-home"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kode Pos</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" name="kode_pos" class="form-control" id="basic-icon-default-fullname" placeholder="Kode POS" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-mail-send"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor Telpon</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_telpon" class="form-control" id="basic-icon-default-fullname" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="08*******" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bxl-whatsapp"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor KTP</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_ktp" class="form-control" id="basic-icon-default-fullname" placeholder="No KTP" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-id-card"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" accept="image/png" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname1">Preview KTP</label>
                                    </br>
                                    <img class="img" id="avatar" width="300" height="100px" />
                                    <input type="hidden" id="textArea" name="docFile">
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="submit" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-save me-1"></span>Save
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