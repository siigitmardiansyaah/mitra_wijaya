<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="<?php echo base_url() ?>dashboard">Home</a> / <a href="<?php echo base_url() ?>deposit/tambah_deposit">Deposit</a> /</span> Detail Deposit
    </h4>
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-12 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="<?php echo $data->icon ?>" alt="">
                                </span>
                                <!-- <span class="app-brand-text demo text-body fw-bold"><?php echo $data->bank ?></span> -->
                            </div>
                            <h2 class="mb-0"><?php echo $data->bank ?></h2>
                            <!-- <p class="mb-1">San Diego County, CA 91905, USA</p>
                            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p> -->
                        </div>
                        <div>
                            <h4>Invoice #<?php echo $data->deposit_id ?></h4>
                            <div class="mb-2">
                                <span class="me-1">Tanggal:</span>
                                <span class="fw-medium"><?php echo date('d/m/Y H:i:s',strtotime($data->tanggal)) ?></span>
                            </div>
                            <div class="mb-2">
                                <span class="me-1">Status:</span>
                                <?php if ($data->status == 'sukses' || $data->status == 'paid') : ?>
                                    <span class="fw-medium badge bg-label-success"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'pending') : ?>
                                    <span class="fw-medium badge bg-label-warning"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'close') : ?>
                                    <span class="fw-medium badge bg-label-danger"><?php echo $data->status ?></span>
                                <?php elseif ($data->status == 'refund') : ?>
                                    <span class="fw-medium badge bg-label-danger"><?php echo $data->status ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
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
                                <h6 class="alert-heading d-flex align-items-center mb-1">Sukses Tambah Deposit</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success1')) : ?>
                        <div class="alert alert-success d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Sukses Hapus Deposit</h6>
                                <span><?php echo $this->session->flashdata('success1') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                            <h6 class="pb-2">Silahkan lakukan Transfer ke:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3">No. Rekening:</td>
                                        <td style="font-weight: bold;"><?php echo $data->nomor_rekening ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Nama. Rekening:</td>
                                        <td><?php echo $data->nama_rekening ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Jumlah:</td>
                                        <td><?php echo $data->jumlah ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group input-group-merge">
                            <div class="demo-inline-spacing">
                                <a href="<?php echo base_url() ?>deposit/history_deposit" class="btn btn-outline-info">
                                    <span class="tf-icons bx bx-arrow-back me-1"></span>Kembali
                                </a>
                                <?php if ($data->status == 'pending') : ?>
                                    <a href="<?php echo base_url() ?>deposit/cancel_deposit/<?php echo $data->deposit_id ?>" class="btn btn-outline-warning">
                                        <span class="tf-icons bx bx-trash me-1"></span>Cancel Deposit
                                    </a>
                                <?php endif; ?>
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
            <!-- /Invoice -->
        </div>
    </div>
</div>

<!-- Modal -->

<!-- / Content -->