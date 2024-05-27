<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / Harga /</span> Generate
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Generate</h5>
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
                    <style>
                        .form-group {
                            display: flex;
                            flex-wrap: wrap;
                        }

                        .form-check {
                            flex: 0 0 calc(16.666% - 10px);
                            /* Membagi 16.666% dari lebar parent dengan jarak antar checkbox */
                            margin-right: 10px;
                            /* Jarak antara checkbox */
                            margin-bottom: 10px;
                            /* Jarak antar baris */
                        }
                    </style>

                    <div class="row gy-3">
                        <div class="col-md-11">
                            <h4 class="text-light fw-medium d-block" style="font-weight: bold;">Produk</h4>
                            <div class="form-group">
                                <?php $count = 0; ?>
                                <?php foreach ($data as $key) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo $count ?>" value="<?php echo $key->op_produk ?>" />
                                        <label class="form-check-label" style="font-weight: bold;" for="inlineCheckbox<?php echo $count ?>"><?php echo $key->op_nama ?></label>
                                    </div>
                                    <?php $count++; ?>
                                    <?php if ($count % 6 === 0) : ?>
                                        <div class="w-100"></div> <!-- Membuat baris baru setelah enam checkbox -->
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-merge">
                                <div class="demo-inline-spacing">
                                    <button type="button" class="btn btn-outline-primary" id="btnSubmit1">
                                        <span class="tf-icons bx bx-cog me-1"></span>Generate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <hr class="mt-0">
                    <br />
                    <h4 style="text-transform: uppercase;font-weight: bold;">LINK</h4>
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="selectpickerBasic" class="form-label">Link Harga</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="dana_tarikan" value="<?php echo $link_1 ?>" class="form-control" id="basic-icon-default-fullname" placeholder="Link Harga" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly/>
                                        <span onclick="copyText()" style="cursor: pointer; color: blue;" id="basic-icon-default-fullname1" class="input-group-text"><i class="bx bx-copy"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="basic-icon-default-fullname">Link JSON</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="dana_tarikan" class="form-control" value="<?php echo $link_2 ?>" id="basic-icon-default-fullnamee" placeholder="Link JSON" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly/>
                                        <span onclick="copyText1()" style="cursor: pointer; color: blue;" id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-copy"></i></span>
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