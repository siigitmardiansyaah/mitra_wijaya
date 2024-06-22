<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / </span> Dana Customer
        Registrasi
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Registrasi Dana
                        <span class="<?php if($data->status == 'pending')
                        {echo 'badge bg-label-warning';}
                        else if($data->status == 'approve')
                        {echo 'badge bg-label-success';}
                        else if($data->status== 'reject')
                        {echo 'badge bg-label-danger';}
                        else if($data->status == 'revisi')
                        {echo 'badge bg-label-info';}?>" style="text-transform: uppercase;">
                            <?php echo $data->status ?></span>
                    </h5>
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12"
                                    <?php if($data->status == 'pending' || $data->status == 'approve') : ?>
                                    style='display:none;' <?php endif; ?>>
                                    <label class="col-form-label" for="basic-icon-default-fullname">Catatan Reject /
                                        Revisi</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_depan" class="form-control"
                                            id="basic-icon-default-fullname" placeholder="Nama Depan"
                                            aria-label="John Doe" value="<?php echo $data->catatan_revisi;?>"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-note"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama Depan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_depan" class="form-control"
                                            id="basic-icon-default-fullname" placeholder="Nama Depan"
                                            aria-label="John Doe" value="<?php echo $data->firstName;?>"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama
                                        Belakang</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_belakang" class="form-control"
                                            id="basic-icon-default-fullname" placeholder="Nama Depan"
                                            aria-label="John Doe" value="<?php echo $data->lastName;?>"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nama
                                        Merchant</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_merchant" class="form-control"
                                            id="basic-icon-default-fullname" placeholder="Nama Merchant"
                                            aria-label="John Doe" value="<?php echo $data->divisionName;?>"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectpickerBasic" class="form-label">Jenis Usaha</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="jen_usaha" disabled>
                                        <option value="">Pilih Jenis Usaha</option>
                                        <option value="4814|Konter Pulsa"
                                            <?php if($data->mccCodes == '4814|Konter Pulsa'){echo 'selected';} ?>>Konter
                                            Pulsa</option>
                                        <option value="4722|Travel"
                                            <?php if($data->mccCodes == '4722|Travel'){echo 'selected';} ?>>Travel
                                        </option>
                                        <option value="5411|Toko Kelontong"
                                            <?php if($data->mccCodes == '5411|Toko Kelontong'){echo 'selected';} ?>>Toko
                                            Kelontong</option>
                                        <option value="5814|Kantin / Warung Makan"
                                            <?php if($data->mccCodes == '5814|Kantin / Warung Makan'){echo 'selected';} ?>>
                                            Kantin / Warung Makan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Deskripsi
                                        Merchant</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="deskripsi_merchant"
                                            value="<?php echo $data->divisionDescription;?>" class="form-control"
                                            id="basic-icon-default-fullname"
                                            placeholder="Deskripsi Merchant || Deskripsi Secara Singkat"
                                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                            readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Logo</label>
                                    <input type="file" id="logo" disabled class="form-control" name="logo"
                                        accept="image/png" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Preview Logo</label>
                                    <br />
                                    <img class="img" src="<?php echo $data->PC_LOGO?>" width="300" height="100px" />
                                    <input type="hidden" id="textArealogo" name="PC_LOGO">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Provinsi</label>
                                    <select id="select2Basic1" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="provinsi" disabled>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $key) : ?>
                                        <option value="<?php echo $key->KycProvince ?>"
                                            <?php if($data->province == $key->KycProvince){echo 'selected';}?>>
                                            <?php echo $key->KycProvince ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Kota</label>
                                    <select id="select2Basic2" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="kota" disabled>
                                        <option value="">Pilih Kota</option>
                                        <?php foreach ($kota as $key) : ?>
                                        <option value="<?php echo $key->KycRegency ?>"
                                            <?php if($data->city == $key->KycRegency){echo 'selected';}?>>
                                            <?php echo $key->KycRegency ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selectpickerBasic" class="form-label">Kecamatan</label>
                                    <select id="select2Basic3" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="kecamatan" disabled>
                                        <option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $key) : ?>
                                        <option value="<?php echo $key->KycDistrict ?>"
                                            <?php if($data->area == $key->KycDistrict){echo 'selected';}?>>
                                            <?php echo $key->KycDistrict ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Alamat 1</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="alamat1" class="form-control"
                                            id="basic-icon-default-fullname" value="<?php echo $data->address1;?>"
                                            placeholder="Alamat 1" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-home"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Alamat 2</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="alamat2" class="form-control"
                                            id="basic-icon-default-fullname" value="<?php echo $data->address2;?>"
                                            placeholder="Alamat 2" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-home"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Kode Pos</label>
                                    <select id="select2Basic4" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="kode_pos" disabled>
                                        <option value="">Pilih Kode POS</option>
                                        <?php foreach ($kodepos as $key) : ?>
                                        <option value="<?php echo $key->KycPostcode ?>"
                                            <?php if($data->postcode == $key->KycPostcode){echo 'selected';}?>>
                                            <?php echo $key->KycPostcode ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor Telpon</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_telpon" class="form-control"
                                            id="basic-icon-default-fullname"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            placeholder="08*******" aria-label="John Doe"
                                            value="<?php echo $data->mobileNo;?>"
                                            aria-describedby="basic-icon-default-fullname2" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bxl-whatsapp"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Nomor KTP</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="no_ktp" class="form-control"
                                            id="basic-icon-default-fullname" placeholder="No KTP" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2"
                                            value="<?php echo $data->docId;?>" readonly />
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-id-card"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp" id="foto_ktp"
                                        accept="image/png" disabled />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label" for="basic-icon-default-fullname1">Preview KTP</label>
                                    </br>
                                    <img class="img" src="<?php echo $data->docFile?>" id="avatar" width="300"
                                        height="100px" />
                                    <input type="hidden" id="textArea" name="docFile">
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="submit" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-save me-1"></span>Save
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" <?php if($data->status != 'approve') : ?> style=display:none <?php endif;?>>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List Produk Dana
                    </h5>
                </div>

                <div class="card-body">
                    <div class="card-datatable table-responsive">
                        <table class="dt-row-grouping table border-top" id="tableProduk">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Harga Reseller</th>
                                    <th>Harga Umum</th>
                                    <th>Nominal</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->