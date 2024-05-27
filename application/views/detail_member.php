<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / <a href="<?php echo base_url() ?>member/list_member">Member</a> /</span> Detail Member
    </h4>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
            <!-- Customer-detail Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="customer-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-3" src="<?php echo base_url() ?>assets/assets/img/avatars/3.png" height="110" width="110" alt="User avatar" />
                            <div class="customer-info text-center">
                                <h4 class="mb-1"><?php echo $data->nama_lengkap ?></h4>
                                <small style="font-weight: bold;"><?php echo $data->nomor_ktp ?></small>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="d-flex justify-content-around flex-wrap mt-4 py-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary"><i class='bx bx-dollar bx-sm'></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">Rp. <?php echo $data->balance ?></h5>
                                <span>Saldo QRIS</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="demo-inline-spacing">
                        <a href="<?php echo base_url() ?>member/list_member" class="btn btn-outline-primary">
                            <span class="tf-icons bx bx-arrow-back me-1"></span>Kembali
                        </a>
                    </div>
                    <div class="info-container">
                        <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3" style="font-weight: bold;">DETAILS</small>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card-datatable table-responsive">
                                    <table class="table table-bordered" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td><?php echo $data->nama_lengkap ?></td>
                                            </tr>
                                            <tr>
                                                <td>Saldo QRIS</td>
                                                <td>Rp. <?php echo $data->balance ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor KTP</td>
                                                <td><?php echo $data->nomor_ktp ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor NPWP</td>
                                                <td><?php echo $data->nomor_npwp ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Whatsapp</td>
                                                <td><?php echo $data->nomor_wa ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $data->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Toko</td>
                                                <td><?php echo $data->nama_toko ?></td>
                                            </tr>
                                            <tr>
                                                <td>Negara</td>
                                                <td><?php echo $data->negara ?></td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td><?php echo $data->prov_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kota / Kabupaten</td>
                                                <td><?php echo $data->city_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td><?php echo $data->dis_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos</td>
                                                <td><?php echo $data->kode_pos ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $data->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><?php echo $data->jenis_kelamin ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kategori Usaha</td>
                                                <td><?php echo $data->kategoriusaha ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Usaha</td>
                                                <td><?php echo $data->jenisusaha ?></td>
                                            </tr>
                                            <tr>
                                                <td>Toko Fisik ?</td>
                                                <td><?php echo $data->toko_fisik ?></td>
                                            </tr>
                                            <tr>
                                                <td>File KTP</td>
                                                <td>
                                                    <div class="demo-inline-spacing">
                                                        <a href="https://dashboard.mitrawijaya.com/assets/pemohon_qris/<?php echo $data->nama_file ?>" class="btn btn-outline-success" target="_blank">
                                                            <span class="tf-icons bx bxs-file-find me-1"></span>Lihat File
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File Selfie KTP</td>
                                                <td>
                                                    <div class="demo-inline-spacing">
                                                        <a href="https://dashboard.mitrawijaya.com/assets/pemohon_qris/<?php echo $data->nama_file_selfie ?>" class="btn btn-outline-info" target="_blank">
                                                            <span class="tf-icons bx bxs-file-find me-1"></span>Lihat File
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="col-form-label" for="basic-icon-default-fullname">NMID</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname" placeholder="NMID" value="<?php echo $data->nmid?>" readonly aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="col-form-label" for="basic-icon-default-fullname">MID</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname" placeholder="MID" value="<?php echo $data->mid?>" readonly aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="col-form-label" for="basic-icon-default-fullname">TID</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" name="nama_toko" class="form-control" id="basic-icon-default-fullname" placeholder="TID" value="<?php echo $data->tid?>" readonly aria-label="John Doe" aria-describedby="basic-icon-default-fullname" />
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-credit-card-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group col-md-12">
                                                        <div class="input-group input-group-merge">
                                                            <div class="demo-inline-spacing">
                                                                <button type="button" class="btn btn-outline-primary" id="btnSubmit">
                                                                    <span class="tf-icons bx bx-search me-1"></span>Tampilkan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Customer-detail Card -->
            <!-- Plan Card -->

            <!-- /Plan Card -->
        </div>
    </div>
</div>
</div>

<!-- Modal -->

<!-- / Content -->