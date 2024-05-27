<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / QRIS Merchant /</span> Tambah Member QRIS
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Member</h5>
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
                    <form action="<?php echo base_url() ?>member/regis_member" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nm_lengkap" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="token" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="key" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <input type="hidden" name="secret" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Lengkap" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Toko</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nm_toko" class="form-control" id="basic-icon-default-fullname" placeholder="Nama Toko" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor WA</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_wa" class="form-control" id="basic-icon-default-fullname" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="08*******" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bxl-whatsapp"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="email" name="email" class="form-control" id="basic-icon-default-fullname" placeholder="Email" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor KTP</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_ktp" class="form-control" id="basic-icon-default-fullname" placeholder="No KTP" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-id-card"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">NPWP</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_npwp" class="form-control" id="basic-icon-default-fullname" placeholder="No NPWP" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card-alt"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Jenis Kelamin</label>
                                    <select id="select2Basic" class="form-select" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Toko Fisik ?</label>
                                    <select id="select2Basic" class="form-select" name="toko_fisik" required>
                                        <option value="">Pilih Jawaban</option>
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Kategori Usaha</label>
                                    <select id="select2Basic" class="form-select" data-allow-clear="true" name="kat_usaha" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $key) : ?>
                                            <option value="<?php echo $key->id ?>"><?php echo $key->deskripsi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Jenis Usaha</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="jen_usaha" required>
                                        <option value="">Pilih Jenis Usaha</option>
                                        <?php foreach ($usaha as $key) : ?>
                                            <option value="<?php echo $key->id ?>"><?php echo $key->deskripsi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Provinsi</label>
                                    <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true" name="provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $key) : ?>
                                            <option value="<?php echo $key->prov_id ?>"><?php echo $key->prov_name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Kota</label>
                                    <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true" name="kota" required>
                                        <option value="">Pilih Kota</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Kecamatan</label>
                                    <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true" name="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kode Pos</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" name="kode_pos" class="form-control" id="basic-icon-default-fullname" placeholder="Kode POS" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-mail-send"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Alamat</label>
                                    <div class="input-group input-group-merge">
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp" required />
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Foto Selfie KTP</label>
                                    <input type="file" class="form-control" name="foto_selfie" required />
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